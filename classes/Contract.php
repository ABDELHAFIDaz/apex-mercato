<?php
class Contract {
    
    public function __construct(
        private float $salary,
        private float $buybackClause,
        private dateTimeImmutable $startDate,
        private dateTime $endDate
    ){}
}