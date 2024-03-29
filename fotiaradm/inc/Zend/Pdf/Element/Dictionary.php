<?php
/**
 * Zend Framework
 *
 * LICENSE
 *
 * This source file is subject to the new BSD license that is bundled
 * with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://framework.zend.com/license/new-bsd
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@zend.com so we can send you a copy immediately.
 *
 * @category   Zend
 * @package    Zend_Pdf
 * @copyright  Copyright (c) 2005-2010 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 * @version    $Id: Dictionary.php,v 1.1 2010-11-17 18:40:07 root Exp $
 */


/** Internally used classes */
require_once 'Zend/Pdf/Element/Name.php';


/** Zend_Pdf_Element */
require_once 'Zend/Pdf/Element.php';

/**
 * PDF file 'dictionary' element implementation
 *
 * @category   Zend
 * @package    Zend_Pdf
 * @copyright  Copyright (c) 2005-2010 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
class Zend_Pdf_Element_Dictionary extends Zend_Pdf_Element
{
    /**
     * Dictionary elements
     * Array of Zend_Pdf_Element objects ('name' => Zend_Pdf_Element)
     *
     * @var array
     */
    private $_items = array();


    /**
     * Object constructor
     *
     * @param array $val   - array of Zend_Pdf_Element objects
     * @throws Zend_Pdf_Exception
     */
    public function __construct($val = null)
    {
        if ($val === null) {
            return;
        } else if (!is_array($val)) {
            require_once 'Zend/Pdf/Exception.php';
            throw new Zend_Pdf_Exception('Argument must be an array');
        }

        foreach ($val as $name => $element) {
            if (!$element instanceof Zend_Pdf_Element) {
                require_once 'Zend/Pdf/Exception.php';
                throw new Zend_Pdf_Exception('Array elements must be Zend_Pdf_Element objects');
            }
            if (!is_string($name)) {
                require_once 'Zend/Pdf/Exception.php';
                throw new Zend_Pdf_Exception('Array keys must be strings');
            }
            $this->_items[$name] = $element;
        }
    }


    /**
     * Add element to an array
     *
     * @name Zend_Pdf_Element_Name $name
     * @param Zend_Pdf_Element $val   - Zend_Pdf_Element object
     * @throws Zend_Pdf_Exception
     */
    public function add(Zend_Pdf_Element_Name $name, Zend_Pdf_Element $val)
    {
        $this->_items[$name->value] = $val;
    }

    /**
     * Return dictionary keys
     *
     * @return array
     */
    public function getKeys()
    {
        return array_keys($this->_items);
    }


    /**
     * Get handler
     *
     * @param string $property
     * @return Zend_Pdf_Element | null
     */
    public function __get($item)
    {
        $element = isset($this->_items[$item]) ? $this->_items[$item]
                                               : null;

        return $element;
    }

    /**
     * Set handler
     *
     * @param string $property
     * @param  mixed $value
     */
    public function __set($item, $value)
    {
        if ($value === null) {
            unset($this->_items[$item]);
        } else {
            $this->_items[$item] = $value;
        }
    }

    /**
     * Return type of the element.
     *
     * @return integer
     */
    public function getType()
    {
        return Zend_Pdf_Element::TYPE_DICTIONARY;
    }


    /**
     * Return object as string
     *
     * @param Zend_Pdf_Factory $factory
     * @return string
     */
    public function toString($factory = null)
    {
        $outStr = '<<';
        $lastNL = 0;

        foreach ($this->_items as $name => $element) {
            if (!is_object($element)) {
                require_once 'Zend/Pdf/Exception.php';
                throw new Zend_Pdf_Exception('Wrong data');
            }

            if (strlen($outStr) - $lastNL > 128)  {
                $outStr .= "\n";
                $lastNL = strlen($outStr);
            }

            $nameObj = new Zend_Pdf_Element_Name($name);
            $outStr .= $nameObj->toString($factory) . ' ' . $element->toString($factory) . ' ';
        }
        $outStr .= '>>';

        return $outStr;
    }


    /**
     * Convert PDF element to PHP type.
     *
     * Dictionary is returned as an associative array
     *
     * @return mixed
     */
    public function toPhp()
    {
        $phpArray = array();

        foreach ($this->_items as $itemName => $item) {
            $phpArray[$itemName] = $item->toPhp();
        }

        return $phpArray;
    }
}
