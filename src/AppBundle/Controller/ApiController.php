<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\ConflictHttpException;
use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class ApiController extends Controller
{
    private $encoders = array();
    private $normalizers = array();
    private $serializer = null;
    private $response = null;

    /**
     * ApiController constructor.<br>
     * <br>
     * Initialise les encoders et normalizers pour la convertion de l'entité en objet json.
     */
    public function __construct()
    {
        $this->encoders = array(new JsonEncoder());
        $this->normalizers = array(new ObjectNormalizer());
        $this->serializer = new Serializer($this->normalizers, $this->encoders);

        $this->response = new Response();
        $this->response->headers->set('Content-Type', 'application/json');
        $this->response->headers->set('Access-Control-Allow-Origin', 'http://localhost:8080');
    }

    /**
     * Récupère les enregistrements d'une entitée.<br>
     * Ne prend qu'un seul paramètre dans l'url.<br>
     * <br>
     * <b>Ex : /api/{entity}(?{field}={value}) => /api/user | /api/user?id=1</b><br>
     * <br>
     * Peut retourner les exceptions suivantes :<br>
     * - BadRequestHttpException : Le nombre de paramètre est supérieur à 1<br>
     * - ConflictHttpException : Le champ {filed} ne correspond à aucun champ de {entity}<br>
     * - MethodNotAllowedException : Méthode http incorrecte<br>
     * <br>
     *
     * @param Request $request
     * @param $entity
     * @return null|Response
     */
    public function getAction(Request $request, $entity)
    {
        $em = $this->getDoctrine()->getManager();
        $tableSchema = $this->get('app.table_schema');
        $object = array();
        $props = $tableSchema->getPropsOf(ucfirst($entity));

        // On récupère les paramètres de la requête dans l'url
        $keysParam = $request->query->keys();

        // On test le nombre de paramètre
        // Le nombre de paramètre ne doit pas dépasser 1 élément
        if (count($keysParam) > 1) throw new BadRequestHttpException('Only accept one parameter in url query.');

        // On initialise les variables de l'url
        if (isset($keysParam[0])) {
            // On récupère le paramètre existant
            $field = isset($keysParam[0]) ? $keysParam[0] : null;
            $value = $request->query->get($field ? $field : null);

            // On vérifie que le paramètre précisé dans la requête existe dans les attributs de la classe
            $propFound = false;
            foreach ($props as $prop) {
                if ($prop == $keysParam[0]) {
                    $propFound = true;
                    break;
                }
            }

            // On déclanche une exception pour indiquer que le paramètre n'existe pas dans l'entité
            if (!$propFound) throw new ConflictHttpException("The parameter in url query doesn't exist in entity.");
        }

        // On test la méthode
        if (!$request->isMethod('GET')) {
            throw new MethodNotAllowedException(array('GET'), 'Only accept GET method');
        }

        // On test si le champ est définit pour construire la requête en fonction des paramètres
        if (isset($field)) {
            $repo = $em->getRepository('AppBundle:' . ucfirst($entity));
            $object = $repo->createQueryBuilder('a')
                ->where("a.$field LIKE :value")
                ->setParameter('value', "%$value%")
                ->getQuery()
                ->getResult();
        } else {
            $object = $em->getRepository('AppBundle:' . ucfirst($entity))->findAll();
        }

        $this->response->setContent($this->serializer->serialize([
            "success" => true,
            "message" => null,
            "data" => $object
        ], 'json'));

        return $this->response;
    }

    /**
     * Supprime un enregistrement de la table $entity avec l'identifiant $id.
     *
     * @param $entity
     * @param $id
     * @return null|Response
     */
    public function deleteAction($entity, $id)
    {
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBunble:' . $entity)->find($id);
        if (!$entity) {
            throw new ConflictHttpException("The entity :$entity doesn't exist.");
        }

        $em->remove($entity);
        $em->flush();

        $this->response->setContent($this->serializer->serialize([
            "success" => true,
            "message" => null,
            "data" => null
        ], 'json'));

        return $this->response;
    }

    public function getSchemaAction(Request $request, $entity)
    {
        $tableSchema = $this->get('app.table_schema');
        $props = $tableSchema->getPropsOf(ucfirst($entity), array('id', 'user'));

        // On test la méthode
        if (!$request->isMethod('GET')) {
            throw new MethodNotAllowedException(array('GET'), 'Only accept GET method');
        }

        $this->response->setContent($this->serializer->serialize([
            "success" => true,
            "message" => null,
            "data" => $props
        ], 'json'));

        return $this->response;
    }

    public function updateAction(Request $request, $entity)
    {
        $em = $this->getDoctrine()->getManager();

        // On test la méthode
        if (!$request->isMethod('POST')) {
            throw new MethodNotAllowedException(array('POST'), 'Only accept POST method');
        }

        $entity = $em->getRepository('AppBundle:' . ucfirst($entity))->find($request->request->get('id'));

        $this->response->setContent($this->serializer->serialize([
            "success" => true,
            "message" => null,
            "data" => null
        ], 'json'));

        return $this->response;
    }
}
