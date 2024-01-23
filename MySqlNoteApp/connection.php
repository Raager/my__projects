<?php

class Connection{
    public PDO $pdo;

    public function __construct()
    {
        $this->pdo = new PDO("mysql:host=db;dbname=note_db", "root", "root");
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getNotes(){
        $statment = $this->pdo->prepare("SELECT * FROM notes ORDER BY date DESC");
        $statment->execute();
        return $statment->fetchAll(PDO::FETCH_ASSOC);
    }

    public function setNotes($note){
        $statment = $this->pdo->prepare("INSERT INTO notes (title, text, date) VALUES (:title, :text, :date)");
        $statment->bindValue('title', $note['title']);
        $statment->bindValue('text', $note['text']);
        $statment->bindValue('date', date('Y-m-d H:i:s'));
        return $statment->execute();
    }

    public function deleteNote($id){
        $statment = $this->pdo->prepare("DELETE FROM notes WHERE id = :id");
        $statment->bindValue('id', $id);
        return $statment->execute();
    }

    public function getNoteById($id){
        $statement = $this->pdo->prepare("SELECT * FROM notes WHERE id = :id");
        $statement->bindValue('id', $id);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function updateNote($note){
        $statment = $this->pdo->prepare("UPDATE notes SET title = :title, text =:text, date= :date WHERE id =:id");
        $statment->bindValue('title', $note['title']);
        $statment->bindValue('id', $note['id']);
        $statment->bindValue('text', $note['text']);
        $statment->bindValue('date', date('Y-m-d H:i:s'));
        return $statment->execute();
    }
}