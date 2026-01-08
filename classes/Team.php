<?php
class Team {
    
    public function __construct(
        private string $name,
        private float $budget,
        private string $manager
    ){}
}