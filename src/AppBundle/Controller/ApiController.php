<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class ApiController extends Controller
{
    private $encoders = array();
    private $normalizers = array();
    private $serializer = null;
    private $response = null;

    public function __construct()
    {
        $this->encoders = array(new JsonEncoder());
        $this->normalizers = array(new ObjectNormalizer());
        $this->serializer = new Serializer($this->normalizers, $this->encoders);

        $this->response = new Response();
        $this->response->headers->set('Content-Type', 'application/json');
    }

    public function getAction(Request $request, $entity)
    {
        $em = $this->getDoctrine()->getManager();
        $object = array();
        $logicalComparator = '=';

        // On récupère les paramètres de la requête de l'url
        $keysParam = $request->query->keys();

        // On initialise les variables de l'url
        $field = isset($keysParam[0]) ? $keysParam[0] : null;
        $value = $request->query->get($field ? $field : null);

        // On test la méthode
        if (!$request->isMethod('GET')) {
            return new Exception('Only accept GET request method');
        }

        // On test si le champ est définit pour construire la requête en fonction des paramètres
        if (isset($field)) {
            $logicalComparator = 'LIKE';
            $repo = $em->getRepository('AppBundle:' . $entity);
            $object = $repo->createQueryBuilder('a')
                ->where("a.$field $logicalComparator :value")
                ->setParameter('value', "%$value%")
                ->getQuery()
                ->getResult();
        } else {
            $object = $em->getRepository('AppBundle:' . $entity)->findAll();
        }

        $this->response->setContent($this->serializer->serialize($object, 'json'));

        return $this->response;
    }
}
