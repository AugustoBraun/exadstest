<?php

    
    namespace exadsTest;
    
    use PDO;
    
    include_once  './tests.php';


    // 3 - TV Series
    // ================================================================
    //The Test description talks about TV Series "gender"
    //I will be Assuming the correct word would be "genre", which makes more sense for a tv series.
    //The genres would work better with a relational table N->N between the tv_series and the genres table.
    //But for the sake of this test I will follow the description

    class problem3 extends problems
    {

        public function __construct()
        {
            parent::__construct();
        }


        /**
         * Method to show the next show based on now time
         *
         * @return  void    echoing a cool text
         */
        public function nextShow(string $title = null)
        {
            echo $this->line_break;
            echo "----------------------------------------------------------------".$this->line_break;

            $nextShow = $this->getShows(null, $title);

            if ($nextShow)
            {
                $nextShow = $nextShow[0]; //considering the very next show is always ONE show

                echo " ".$this->line_break."Next Show: ";
                echo $nextShow['title']." [genre: ".$nextShow['genre']."] - ".$this->days[$nextShow['week_day']]." at ".date("H:m", strtotime($nextShow['show_time'])). " on Channel ".$nextShow['channel'];
            }
            else
            {
                echo "Next Show not avaialble";
            }
            
        }


        /**
         * Method to show the next show based on specific date
         *
         * @return  void    echoing another cool text
         */
        public function nextShowAt(string $date, string $title = null) //date is not nullable
        {
            echo $this->line_break;
            echo "----------------------------------------------------------------".$this->line_break;

            $nextShow = $this->getShows($date);

            if ($nextShow)
            {
                $nextShow = $nextShow[0]; //considering the very next show is always ONE show

                echo " ".$this->line_break."Next Show in ".date("d F Y", strtotime("$date")).": ";
                echo $nextShow['title']." [genre: ".$nextShow['genre']."] - ".$this->days[$nextShow['week_day']]." at ".date("H:m", strtotime($nextShow['show_time'])). " on Channel ".$nextShow['channel'];
            }
            else
            {
                echo "Next Show not avaialble";
            }
            
        }


        /**
         * Method to show the next shows (plural)
         *
         * @return  void    echoing a cool text for every show
         */
        public function nextShows(string $date = null, $title = null, int $limit = 1)
        {
            echo $this->line_break;
            echo "----------------------------------------------------------------".$this->line_break;

            $nextShow = $this->getShows($date, $title, $limit);  //now we have N shows and all arguments

            if (!empty($nextShow))
            {
                foreach ($nextShow as $show)
                {
                    echo " ".$this->line_break."Show: ";
                    echo $show['title']." [genre: ".$show['genre']."] - ".$this->days[$show['week_day']]." at ".date("H:m", strtotime($show['show_time'])). " on Channel ".$show['channel'];
                }
            }
            else
            {
                echo "Next Shows not avaialble";
            }
        }


        /**
         * Method to feed the other methods with the shows they
         *
         * @return  array    array containing all the shows
         */
        public function getShows(string $date = null, $title = null, int $limit = 1): array
        {
            $shows = [];
            $subquery = '';

            if (!$date)
                $date = date("Y-m-d H:i:s");

            if ($title)
                $subquery = " WHERE s.title LIKE '%".$title."%' ";

            $query = "
                        SELECT 
                            * 
                        FROM 
                            tv_series s INNER JOIN tv_series_intervals i ON s.id=i.id_tv_series	
                        ".$subquery."    
                        ORDER BY FIELD(
                            i.week_day, 
                            DAYOFWEEK('".$date."'),
                            DAYOFWEEK('".$date."' + INTERVAL 1 DAY),
                            DAYOFWEEK('".$date."' + INTERVAL 2 DAY),
                            DAYOFWEEK('".$date."' + INTERVAL 3 DAY),
                            DAYOFWEEK('".$date."' + INTERVAL 4 DAY),
                            DAYOFWEEK('".$date."' + INTERVAL 5 DAY),
                            DAYOFWEEK('".$date."' + INTERVAL 6 DAY)
                            ) ASC,
                            i.show_time ASC
                            LIMIT ".$limit
                    ;

            $this->dbConnect(); //execute connection only when it's needed;

            $result = $this->db->query($query);
            $shows  = $result->fetchAll(PDO::FETCH_ASSOC);

            return $shows;
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

            $answer_3 = new problem3;

            $answer_3->nextShow(); //just the next show
            $answer_3->nextShow('robot');   //the next show with robot on the title
            $answer_3->nextShow('crowd');   //same as above
            $answer_3->nextShowAt('2022-06-13');    //next show on specific date
            $answer_3->nextShowAt('2022-06-10', 'stranger'); //specific date and title
            $answer_3->nextShows('2022-06-10', null, 4); //date and amount
            $answer_3->nextShows('2022-06-16', 'robot', 9); //date title and amount

        ?>

        </div>

        <div class="col-2"></div>

    </div>

</div>
<?php
    include('./_footer.php');
?>