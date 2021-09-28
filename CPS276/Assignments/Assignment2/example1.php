<html>
    <ul>
        <?php for ($list1 = 1; $list1 <= 4; $list1++) { ?>
            <li>
                <?php echo($list1) ?>
                <ul>
                    <?php for ($list2 = 1; $list2 <= 5; $list2++) { ?>
                        <li>
                            <?php echo($list2); ?>
                        </li>
                    <?php } ?>
                </ul>
            </li>
        <?php } ?>
    </ul>
</html>

<!DOCTYPE html> 

<html>
    <a href="./">Go Back</a>
</html>