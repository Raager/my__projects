<?php

declare(strict_types = 1);

namespace App\Controllers;

use App\App;
use App\View;


class HomeController
{
    public function index(): View
    {
        return View::make('index');
    }

    public function transactions(): View
    {
        return View::make('transactions');
    }

    public function create()
    {
        if(ISSET($_POST['save'])){
 
            $descriptions = $_POST['descriptions'];
            $amount = $_POST['amount'];
            $check = rand(0, 9999);

            $conn = App::db();
            
            $query = "INSERT INTO transactions.Tr (descriptions, amount, `#check`) VALUES (:descriptions, :amount, :check)";
            $query_run = $conn->prepare($query);
                
            $data = [
                ':descriptions' => $descriptions,
                ':amount' => $amount,
                ':check' => $check,
            ];
            $query_execute = $query_run->execute($data);
        }

        return header('Location: ../transactions');
    }
}
