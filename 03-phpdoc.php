<?php

/**
 * this is a dockblock comment
 * this dockblock comment is used to describe the purpose of the code
 * 
 * these are used to describe the purpose of the code
 * 
 * @author: Your Name
 * @copyright: 2021-2024
 * @license: MIT
 * 
 * 
 */

/**
 * 
 * this dockblock refers to the first code block
 * 
 * @version: 1.0
 * @access public
 * @see: www.example.com
 * 
 * 
 */

class MyClass
{
    /**
     * method description
     * 
     * @param tipo $param1 -- description
     * @param tipo $param2 -- description
     * @return tipo -- description
     * @access public
     * 
     */

    public function myMethod($param1, $param2){
        // code here
        return $param1 . $param2;
    }

    /**
     * method description
     * 
     * @param tipo $param1 -- description
     * @return tipo -- description
     * @access private
     * 
     */


    private function myOtherMethod($param1){
        // code here

        /**
         * variable description
         * @var tipo
         */

        $var = "ciao";
        return $var . $param1;
}


/*

    PARTICULAR CASES

    @property -- used to describe a property of a class accessible only with magic methods __get and __set
    @method -- used to describe a method of a class accessible only with magic methods __call and __callStatic

    VALUE TYPES
    int -- integer
    float -- floating point number
    string -- string
    bool -- boolean
    array -- array
    object -- object of all types
    resource -- resource defined by php as file handler, database connection, etc.
    void -- no return value

    it is possible to mix valuer types, for example: int|string

    for arrays it is possible to specify the type of the elements, for example: int[]
    if is not possible to specify the type of the elements, it is possible to use mixed[]

    for objects it is possible to specify the type of the object with namespace, for example: \MyNamespace\MyClass

*/