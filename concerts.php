
<?php
    class Concert {

        private $name, $city, $style, $date, $attendance, $income;
        
        public function __construct ($name, $city, $style, $date, $attendance, $income){
            $this->name = $name;
            $this->city = $city;
            $this->style = $style;
            $this->date = $date;
            $this->attendance = $attendance;
            $this->income = $income;
        }

        public function getName(){
            return $this->name;
        }

        public function getCity(){
            return $this->city;
        }

        public function getStyle(){
            return $this->style;
        }

        public function getDate(){
            return $this->date;
        } 

        public function getAttendance(){
            return $this->attendance;
        }

        public function getIncome(){
            return $this->income;
        }  

        public function __toString(){
            return $this->getName() . ", " .$this->getCity() . ", " . $this->getStyle() . ", " .  $this->getDate() . ", " . $this->getAttendance() . ", " . $this->getIncome() ;
        }

    }

    
    class DBManager {

        ////////////////////////////////
        // CAMBIAR ESTOS 3 PARÁMETROS //
        ////////////////////////////////

        private $servername = "10.14.1.155";
        private $username = "Agoitz";
        private $schema = 'Agoitz';

        //////////////////////////////
        //////////////////////////////

        private $password = "DW32.Password";
        private $conn;

        function __construct(){
            // Create connection
            $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->schema);

            // Check connection
            if ($this->conn->connect_error) {
                die("Connection failed: " . $this->conn->connect_error);
            }
            // echo "Connected successfully";
        }

        public function storeConcert($concert) {
            $sql = "INSERT INTO concerts (name, city, style, date, attendance, income) VALUES (";
            $sql .= "'" . $concert->getName() . "',' " . $concert->getCity() . "',' " . $concert->getStyle() . "', '" . 
                            $concert->getDate() . "', '" . $concert->getAttendance() . "', '" . $concert->getIncome() . "')";

            if ($this->conn->query($sql) === TRUE) {
                // echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $this->conn->error;
            }
        }
/// $name, $city, $style, $date, $attendance, $income
        public function getConcerts(){
            
            $concertsArray = array();

            if ($result = $this->conn->query("SELECT * FROM concerts")) {
                // echo "Returned rows are: " . $result -> num_rows;

                foreach ($result as $row){
                    $name = $row['name'];
                    $city = $row['city'];
                    $style = $row['style'];
                    $date = $row['date'];
                    $attendance = $row['attendance'];
                    $income = $row['income'];

                    $concert = new Concert($name, $city, $style, $date, $attendance, $income);
                    $concertsArray[] = $concert;
                }
                
                // Free result set
                $result -> free_result();
            }
            return $concertsArray;
        }
    }

?>
