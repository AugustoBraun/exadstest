<?php

    
    namespace exadsTest;
    
    use PDO;    
    use Exads\ABTestData;

    include_once './vendor/autoload.php';
    include_once './tests.php';


    // 4 - A/B Testing
    // ================================================================


    class abTests
    {
        public $range = [];
        public $range_index = 0;
        public $design_names = [];

        /**
         * Method to return the promotion data
         *
         * @param   integer     Integer of the promotion id
         * @return  void        the variables are update for the getters
         */
        public function getData(int $promoId): array
        {
            $abTest = new ABTestData($promoId);
            $promotion = $abTest->getPromotionName();
            $designs = $abTest->getAllDesigns();

            return array_map(function ($item) 
            {
                $new_index = $this->range_index+1;            
                $this->design_names[$item['designId']] = $item['designName'];

                for ($i = $new_index; $i <= (intVal($item['splitPercent']) + $this->range_index); $i++)
                {
                    $this->range[$i] = $item['designId'];                    
                    $new_index = $i;
                }

                $this->range_index = $new_index;
            }, $designs);
        }


        /**
         * Method to return the range of id fot sorting
         *
         * @return  array    an array representing the percentage chance for each design
         */
        public function getRange(): array
        {  
            return $this->range;
        }


        /**
         * Method to return the design names
         *
         * @return  array    an array with the design names
         */
        public function getDesignNames()
        {  
            return $this->design_names;
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

                $promotion = new abTests;

                for ($i = 1; $i <= 3; $i++)
                {
                    $promotion->getData($i);

                    echo '<h3>Promotion ID '.$i.'</h3>';

                    $design_sort = $promotion->getRange();
                    $design_names = $promotion->getDesignNames();
        
                    $design_random = $design_sort[rand(1, 100)];   

                    echo '<h4>Redirecting user to design '.$design_names[$design_random].' ...</h4>';
                    echo '<hr>';
                    echo '<hr>';
                }
            
            ?>

            <div style="margin: 20px auto;">
                <a href="test4.php" class="btn btn-primary btn-sm">Roll Again</a>
            </div>

        </div>

        <div class="col-2"></div>

    </div>

</div>
<?php
    include('./_footer.php');
?>