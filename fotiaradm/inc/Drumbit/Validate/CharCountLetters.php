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

class Drumbit_Validate_CharCountLetters extends Drumbit_Validate_CharCount
{
    public function __construct($min)
    {
    	parent::__construct($min, array_merge(range(65,90), range(97,122)));
       	$this->setType('letras');
    }
}
