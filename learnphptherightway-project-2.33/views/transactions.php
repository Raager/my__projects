<?php
use App\App;
?>
<!DOCTYPE html>
<html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
 integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <head>
        <title>Transactions</title>
        <style>
            table {
                width: 100%;
                border-collapse: collapse;
                text-align: center;
            }

            table tr th, table tr td {
                padding: 5px;
                border: 1px #eee solid;
            }

            tfoot tr th, tfoot tr td {
                font-size: 20px;
            }

            tfoot tr th {
                text-align: right;
            }
        </style>
    </head>
    <body>
    <h3 style="margin-left:auto;margin-right:auto;text-align:center">Transactions</h3>
        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Check #</th>
                    <th>Description</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM transactions.Tr";
                $conn = App::db();
                $statement = $conn->prepare($query);
                $statement->execute();
                
                $statement->setFetchMode(PDO::FETCH_OBJ); //PDO::FETCH_ASSOC
                $result = $statement->fetchAll();
                $result = json_decode(json_encode($result),true);
                $income=0;
                $expanse=0;
                $total=0;
                $isPositive = true;
                if($result)
                {
                    foreach($result as $row)
                    {
                        $total += $row['amount'];
                        if($row['amount'] >= 0){
                            $income +=$row['amount'];
                            $isPositive = true;
                        }
                        else{
                            $expanse +=$row['amount'];
                            $isPositive = false;
                        }

                        ?>
                        <tr>
                            <th><?php echo($row['date'])?></th>
                            <th><?php echo($row['#check'])?></th>
                            <th><?php echo($row['descriptions'])?></th>
                            <th style=" <?php if($isPositive){ 
                                echo('color:green');
                            }else{
                                echo('color:red');
                            }?>">
                            <?php echo($row['amount'])?></th>
                        </tr>
                        <?php
                    }
                }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="3">Total Income:</th>
                    <td><?php echo($income)?></td>
                </tr>
                <tr>
                    <th colspan="3">Total Expense:</th>
                    <td><?php echo($expanse)?></td>
                </tr>
                <tr>
                    <th colspan="3">Net Total:</th>
                    <td><?php echo($total)?></td>
                </tr>
            </tfoot>
        </table>
        <div class="d-flex justify-content-center m-5 p-3">
            <button class="btn btn-success">
                <a href="/" class="link-light"><h6>Make a transaction</h6></a>
            </button>

        </div>
    </body>
    </html>
    