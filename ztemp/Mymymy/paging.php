<?include("db_connect.php");

$query="SELECT * FROM People ORDER BY lastName";
$result = mysqli_query($link,$query) or die("1. Couldn't execute query");
$numrows = mysqli_num_rows($result);

// how many results on a page
$limit=5;
// current page number
// use @suppress the first-time error or use if(isset($_GET['s'])) instead;
@$s = $_GET['s'] ;


//---------show the results?>
<?if ($numrows>0)
{

    // determine if s has been passed to script, if not use 0
    if (empty($s))
    {
        $s=0;
    }

    $query="SELECT * FROM People ORDER BY lastName";
    $query .= " LIMIT $s,$limit";  //get next set of results
    $result = mysqli_query($link,$query) or die("2. Couldn't execute query");


    $count = 1 + $s ; ?>

    <!--    // display the results returned in a table-->
    <table border="1">

        <? while($r=mysqli_fetch_array($result))
        {?>

            <tr>
                <td><?echo $r["firstName"];?></td>
                <td><?echo $r["lastName"];?></td>
                <td><?echo $r["jobId"];?></td>
                <td><img src="<?echo $r["picture"];?>" alt=""></td>
            </tr>
            <?
        }?>
    </table>
    <?  $currPage = (($s/$limit) + 1);


    echo "<br />";

    //link to other results

    if ($s>=1) 	// bypass “previous” link if s is 0
    {
        $prevs=($s-$limit);

        echo "&nbsp;<a href=\"paging.php?s=$prevs\">&lt;&lt;Prev Page</a>&nbsp;&nbsp;";
    }

    // calculate number of pages needing links
    $pages=intval($numrows/$limit);

    if ($numrows%$limit)
    {
        $pages++;

    }

    //----start page links
    $currentpage=($s/$limit+1);
    if($pages>2)
    {
        for ($t=1;$t<$pages+1;$t++)
        {
            echo(" ");
            if($t!=$currentpage)
            {
                $news=($t*$limit)-$limit;
                echo("<a href=\"paging.php?s=$news\">");
            }
            echo($t);
            if($t!=$currentpage)
            {
                echo("</a>");
            }
            echo(" ");

        }
    }
    //----end page links



    // check to see if last page
    if (!((($s+$limit)/$limit)==$pages) && $pages!=1)  // not last page so
        // give ”next” link
    {
        $news=$s+$limit;
        echo "&nbsp;<a href=\"paging.php?s=$news\">Next page&gt;&gt;</a>";
    }

    $a = $s + ($limit) ;
    if ($a > $numrows) { $a = $numrows ; }
    $b = $s + 1 ;
    echo "<p><b>Showing results $b to $a of $numrows</b></p>";
}

?>
