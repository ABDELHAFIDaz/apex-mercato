<?php
class Coach extends Person {

    public function __construct(
        string $name,
        string $email,
        string $nationality,
        private string $coachingStyle,
        private string $yearsOfExperience
    ){
        parent::__construct($name, $email, $nationality);
    }

    // public function getAnnualCost(): float {
    //     return $this->
    // }

    public function  addToTeam(PDO $pdo, int $teamId): void
    {
        
    }
}