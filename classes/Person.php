<?php
abstract class Person{
    
    public function __construct(
        protected string $name,
        protected string $email,
        protected string $nationality
    ){}
}