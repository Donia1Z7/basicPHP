<?php
class chef{
    private $firstName;
    private $lastName;
    private $salary;
    private $alerts;
    private $is_active;
    public function __construct($firstName,$lastName,$salary_amount,$salary_currency)
    {
        $this->firstName=$firstName;
        $this->lastName=$lastName;
        $this->salary= [
            "amount"=>$salary_amount ,
            "currency"=>$salary_currency
        ];
        $this->alerts=[
            "alert1"=>false,
            "alert2"=>false,
            "alert3"=>false
        ];
    }
    public function assignNewAlert(){
            $alerts = ['alert1', 'alert2', 'alert3'];

            foreach ($alerts as $alert) {

                if ($this->alerts[$alert] === false) {

                    $this->alerts[$alert] = true;
                    $this->salary['amount'] -= 500;
                    break;
                }
            }

            if ($this->alerts['alert3'] === true) {

                $this->is_active = false;
            }

        }
  function yearlySalaryRaise($rate){
        switch ($rate) {
            case 'A':
                $raise = 500;
                break;
            case 'B':
                $raise = 300;
                break;
            case 'C':
                $raise = 100;
                break;
            default:
                $raise = 0;
        }
        $this->salary['amount']+=$raise;
        return $raise;

        }

    public function getSalaryAmount(){
        return $this->salary['amount'];
    }
}
 $chef01 = new chef('Donia','Hasan',5000,'$');
echo "salary= ",$chef01->getSalaryAmount();
$chef01->assignNewAlert();
$chef01->assignNewAlert();
$chef01->assignNewAlert();
$chef01->yearlySalaryRaise('A');
echo 'salary?',$chef01->getSalaryAmount();