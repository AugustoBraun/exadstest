<?php

    
    namespace exadsTest;
    
    include_once  './tests.php';



    // 1 - Prime Numbers 
    // ================================================================
    //There is a little mistake in this Test description, 
    //For the number to be prime it has to be divisible by 1 and itself


    class problem1 extends problems
    {
        public function __construct()
        {
            parent::__construct();
        }


        /**
         * Method to return all values from 1 to 100
         *
         * @return  string  Return of values and their respective multiples / Prime or not
         */
        public function printIntegers(int $range_start = 1, int $range_end = 100, string $web = null)
        {
            for ($i = $range_start ; $i <= $range_end; $i++)
            {
                $answer = 'PRIME';
                $multiples = $this->getMultiples($i);

                if (count($multiples) > 2)
                    $answer = implode(',', $multiples);
                    
                echo $i." [". $answer. "] ".$this->line_break;
            }
        }


        /**
         * Method to return all integer multiples from an integer value
         *
         * @param   integer     Integer to process the multiples
         * @return  array       Return of multiples or null
         */
        public function getMultiples(int $value): array
        {
            $multiples = [];

            for ($i = 1; $i <= $value; $i++)
            {
                if ($value % $i == 0)
                    $multiples[] = $i;
            }

            return $multiples;
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

            $answer_1 = new problem1;
            $answer_1->printIntegers();

            //changing the range of numbers
            // $answer_1->printIntegers(20,200);

        ?>

        </div>

        <div class="col-2"></div>

    </div>

</div>
<?php
    include('./_footer.php');
?>