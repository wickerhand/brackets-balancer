<?php

$string = '[{}](){{[()]}}';

try
{
    
    if (balanceBrackets($string)) 
    {
        echo 'Valid Parameter';
    }
    else
    {
        echo 'Not Valid parameter';
    }
}
catch(Exception $e)
{
    echo $e->getMessage();
}

function balanceBrackets($string)
{
    $balance = array();
    for ($i = 0; $i < strlen($string); $i++) 
    {
        //allowed chars  (){}[]
        if (!($string[$i] === "(" || $string[$i] === ")" 
             || $string[$i] === "{" || $string[$i] === "}" 
             || $string[$i] === "[" || $string[$i] === "]")) {
          throw new InvalidArgumentException("Invalid string");
        } 
        else if ($string[$i] === "(" || $string[$i] === "{" || $string[$i] === "[") 
        {
          array_push($balance, $string[$i]);
        } 
        else if ($string[$i] === ")") 
        {
            if (array_pop($balance) !== "(") 
            {
                return false;
            }
        } 
        else if ($string[$i] === "}") 
        {
            if (array_pop($balance) !== "{") 
            {
                return false;
            }
        } 
        else if ($string[$i] === "]") 
        {
          if (array_pop($balance) !== "[") 
          {
            return false;
          }
        }
    }

    if (count($balance) == 0) 
    {
        return true;
    }
}


