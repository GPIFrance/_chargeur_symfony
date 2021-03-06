<?php

namespace AppBundle\Entity;

use AppBundle\ReferenceClasses\Role;
use Doctrine\ORM\Mapping as ORM;

/**
 * ParamMenu
 *
 * @ORM\Table(name="param_menu")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ParamMenuRepository")
 */
class ParamMenu
{
    const TOP_LEFT = "top left";
    const TOP_CENTER = "top center";
    const TOP_RIGHT = "top right";
    const LEFT_CENTER = "left center";
    const RIGHT_CENTER = "right center";
    const BOTTOM_LEFT = "bottom left";
    const BOTTOM_CENTER = "bottom center";
    const BOTTOM_RIGHT = "bottom right";

    /**
     * @var int
     *
     * @ORM\Column(name="pm_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $pmId;

    /**
     * @var string
     *
     * @ORM\Column(name="pm_libel", type="string", length=255)
     */
    private $pmLibel;

    /**
     * @var string
     *
     * @ORM\Column(name="pm_href", type="string", length=255, nullable=true)
     */
    private $pmHref;

    /**
     * @var int
     *
     * @ORM\Column(name="pm_order", type="integer", nullable=true)
     */
    private $pmOrder;

    /**
     * @var bool
     *
     * @ORM\Column(name="pm_display", type="boolean")
     */
    private $pmDisplay;

    /**
     * @var array
     *
     * @ORM\Column(name="pm_role_access", type="array")
     */
    private $pmRoleAccess;

    /**
     * @var string
     *
     * @ORM\Column(name="pm_msg_content", type="string", length=255, nullable=true)
     */
    private $pmMsgContent;

    /**
     * @var string
     *
     * @ORM\Column(name="pm_msg_position", type="string", length=255, nullable=true)
     */
    private $pmMsgPosition;

    /**
     * ParamMenu constructor.
     */
    public function __construct()
    {
        $this->pmOrder = 0;
        $this->pmDisplay = true;
        $this->pmRoleAccess = array(Role::USER);
    }

    /**
     * Set pmLibel
     *
     * @param string $pmLibel
     *
     * @return ParamMenu
     */
    public function setPmLibel($pmLibel)
    {
        $this->pmLibel = $pmLibel;

        return $this;
    }

    /**
     * Get pmLibel
     *
     * @return string
     */
    public function getPmLibel()
    {
        return $this->pmLibel;
    }

    /**
     * Set pmHref
     *
     * @param string $pmHref
     *
     * @return ParamMenu
     */
    public function setPmHref($pmHref)
    {
        $this->pmHref = $pmHref;

        return $this;
    }

    /**
     * Get pmHref
     *
     * @return string
     */
    public function getPmHref()
    {
        return $this->pmHref;
    }

    /**
     * Set pmOrder
     *
     * @param integer $pmOrder
     *
     * @return ParamMenu
     */
    public function setPmOrder($pmOrder)
    {
        $this->pmOrder = $pmOrder;

        return $this;
    }

    /**
     * Get pmOrder
     *
     * @return int
     */
    public function getPmOrder()
    {
        return $this->pmOrder;
    }

    /**
     * Set pmDisplay
     *
     * @param boolean $pmDisplay
     *
     * @return ParamMenu
     */
    public function setPmDisplay($pmDisplay)
    {
        $this->pmDisplay = $pmDisplay;

        return $this;
    }

    /**
     * Get pmDisplay
     *
     * @return bool
     */
    public function getPmDisplay()
    {
        return $this->pmDisplay;
    }

    /**
     * Set pmRoleAccess
     *
     * @param array $pmRoleAccess
     *
     * @return ParamMenu
     */
    public function setPmRoleAccess($pmRoleAccess)
    {
        $this->pmRoleAccess = $pmRoleAccess;

        return $this;
    }

    /**
     * Get pmRoleAccess
     *
     * @return array
     */
    public function getPmRoleAccess()
    {
        return $this->pmRoleAccess;
    }

    /**
     * Set pmMsgContent
     *
     * @param string $pmMsgContent
     *
     * @return ParamMenu
     */
    public function setPmMsgContent($pmMsgContent)
    {
        $this->pmMsgContent = $pmMsgContent;

        return $this;
    }

    /**
     * Get pmMsgContent
     *
     * @return string
     */
    public function getPmMsgContent()
    {
        return $this->pmMsgContent;
    }

    /**
     * Set pmMsgPosition
     *
     * @param string $pmMsgPosition
     *
     * @return ParamMenu
     */
    public function setPmMsgPosition($pmMsgPosition)
    {
        $this->pmMsgPosition = $pmMsgPosition;

        return $this;
    }

    /**
     * Get pmMsgPosition
     *
     * @return string
     */
    public function getPmMsgPosition()
    {
        return $this->pmMsgPosition;
    }

    /**
     * Get pmId
     *
     * @return integer
     */
    public function getPmId()
    {
        return $this->pmId;
    }
}
