<?php

    
    namespace exadsTest;
    
    include_once  './tests.php';



    // 2 - ASCII Array
    // ================================================================


    class problem2 extends problems
    {
        public $ascii;

        public function __construct()
        {
            parent::__construct();
            
            //generate the original array of ascii
            //44 for comma and 124 for pipe

            for ($i=44; $i <= 124; $i++) 
            { 
                $this->ascii[] = utf8_encode(chr($i));
            }
        }


        /**
         * Method to remove 1 random item from the scrambled array and show it
         *
         * @return  string    The missing character 
         */
        public function missingCharacter(string $web = null)
        {
            $new_array = $this->ascii;

            $position = rand(0, (count($new_array) - 1));

            array_splice($new_array, $position, 1);

            $diff = array_diff($this->ascii, $new_array)[$position];

            return $diff;
            
        }
    }



    include('./_header.php');
?>
<div class="container">

    <?php include './nav.php'; ?>

    <div class="row">

        <div class="col-2"></div>

        <div class="col-8 mt-5">

        <?php

            $answer_2 = new problem2;

            $missing = $answer_2->missingCharacter();

        ?>

            
            <h2>The missing character is: <?=$missing?></h2>

            <div style="margin: 20px auto;">
                <a href="test2.php" class="btn btn-primary btn-sm">Roll Again</a>
            </div>

        </div>

            

        <div class="col-2"></div>

    </div>


</div>
<?php
    include('./_footer.php');
?>