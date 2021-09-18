<html>
    <title>HTML PHP Form Test</title>
    <h2>Test Form</h2>
    <hr>
    <form method="get" action="FormTest.php">
        <table border="0" cellpadding="0" cellspacing="1">
            <tr>
                <th colspan="2">Please enter the requested data.</th>
            </tr>
            <tr>
                <td>Name</td>
                <td>Address</td>
            </tr>
            <tr>
                <td><input name="username" type="text" maxlength="10" size="30"></td>
                <td><input name="address" type="text" maxlength="10" size="30"></td>
            </tr>
        </table>

        <input type="submit" value="Submit">
    </form>
</html>