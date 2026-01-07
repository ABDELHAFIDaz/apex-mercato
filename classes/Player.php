<?php
class Player extends Person {

    public function __construct(
        string $name,
        string $email,
        string $nationality,
        private string $pseudo,
        private string $role,
        private string $marketValue,
    ){
        parent::__construct($name, $email, $nationality);
    }

    public function getAnnualCost(): float
    {
        return $this->marketValue * 12; // it should be salary * 12, but i dont have the contract yet
    }

    public function addToTeam(PDO $pdo, int $playerId, int $teamId): void
    {
        $stmt = $pdo->prepare("insert into team_player (player_id, team_id) values(?, ?)");
        $stmt->execute([$playerId, $teamId]);
    }

    public static function displayAllPlayers(PDO $pdo): array
    {
        $stmt = $pdo->query("select * from players");
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function savePlayer(PDO $pdo): void
    {
        // insert into persons table
        $stmt = $pdo->prepare("insert into persons (name, email, nationality) values(?, ?, ?)");
        $stmt->execute([$this->name, $this->email, $this->nationality]);

        // get the id of the last person inserted
        $stmt = $pdo->query("select id from persons order by id desc limit 1");
        $lastInsertedPerson = $stmt->fetch(PDO::FETCH_OBJ);

        // insert into players table
        $stmt = $pdo->prepare("insert into players (pseudo, role, market_value) values(?, ?, ?)");
        $stmt->execute([$this->pseudo, $this->role, $this->marketValue]);
    }

    public function delete(PDO $pdo, int $playerId)
    {
        $stmt = $pdo->prepare("delete from players where person_id = ?");
        $stmt->execute([$playerId]);
    }
}