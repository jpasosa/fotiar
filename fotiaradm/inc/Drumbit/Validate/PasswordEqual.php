<?php
/**
 * Copyright (C) 2010 Primetec - www.primetec.com.ar
 * 
 * This file is part of Sistema FOTIARADM
 *
 * Sistema FOTIAR ADM is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * 
 * Sistema FOTIAR ADM is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with Sistema FOTIAR ADM.  If not, see <http://www.gnu.org/licenses/>.
 * 
 */

class Drumbit_Validate_PasswordEqual extends Zend_Validate_Abstract
{

	const NOT_MATCH = 'notMatch';

    protected $_messageTemplates = array(
        self::NOT_MATCH => 'las contraseñas no coinciden'
    );
    
    
    protected $_comparisonElement;
    
 	public function __construct($comparisonElement)
    {
        $this->setComparisonElement($comparisonElement);
    }

   
    public function getComparisonElement()
    {
        return $this->_comparisonElement;
    }

    public function setComparisonElement($comparisonElement)
    {
        $this->_comparisonElement = $comparisonElement;
        return $this;
    }

    public function isValid($value, $context = null)
    {
        $value = (string) $value;
        $this->_setValue($value);

        if (is_array($context)) {
            if (isset($context[$this->getComparisonElement()])
                && ($value == $context[$this->getComparisonElement()]))
            {
                return true;
            }
        } elseif (is_string($context) && ($value == $context)) {
            return true;
        }

        $this->_error(self::NOT_MATCH);
        return false;
    }

}
