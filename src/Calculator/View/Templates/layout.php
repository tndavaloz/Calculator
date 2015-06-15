
<html>
    <head>
        <link href="index.css" type="text/css" rel="stylesheet">
        <meta charset="utf-8">
        <title>QL Calculator</title>
        <meta name="author" content="Nick Davaloz">
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet' type='text/css'>
    </head>

    <body>

    <header>
        <h1>Quicken Loans Internship</h1>
        <nav>
            <a href="#" class="selected">Calculator</a>
            <a href="#">Other</a>
        </nav>
    </header>

    <main>
        <strong>QL Intern Project #1</strong>
        <h2>Calculator</h2>

        <p>This is the first project that I have been working on at QL. The main points of this project have been to set up a server and get some code up and running.</p>
        {% 'Nick'|firstFunction %}
        <form action="">
            <fieldset>
                <input type="text" placeholder="X" name="x" required>
                <input type="text" placeholder="Y" name="y" required>

                <input type="radio" name="operator" value="add" />Addition
                <input type="radio" name="operator" value="sub" />Subtract
                <input type="radio" name="operator" value="div" />Divide
                <input type="radio" name="operator" value="mult" />Multiply
            </fieldset>
            <input type="submit" class="button">
        </form>
    </main>

    <footer>
        <p>A project of Nick Davaloz </p>
        <nav>
            <a href="#" class="selected">Calculator</a>
            <a href="#">Other</a>
        </nav>
    </footer>
    </body>

</html>