<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShareCode</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles/dracula.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
        <div class=" container">
            <a class="navbar-brand" href="#">[[ ShareCode ]]</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExample07">
                <ul class="navbar-nav mr-auto">

                </ul>
                <form class="form-inline my-2 my-md-0" action="/search">
                    <input class="form-control" type="text" name="search" placeholder="Search" aria-label="Search">
                </form>
                <a href="#" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Log in</a>
                <a href="#" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true" id="signup-btn">Sign up</a>
            </div>
        </div>
    </nav>
    <div class="container">

        <div class="row masonry-grid">
            <div class="col-md-6 col-lg-4 masonry-column">
                <div class="card card-block">
                    <div class="card-body">
                        <h5 class="card-title">Hello World <span class="badge badge-secondary lg-cpp">C++</span></h5>
                        <pre><code class="cpp">#include &#x3C;iostream&#x3E;

int main() {
    std::cout &#x3C;&#x3C; &#x22;Hello World!&#x22;;
    return 0;
}
                        </code></pre>
                        <p class="card-text">
                            The famous Helloworld in C++.
                            <footer class="blockquote-footer"><a href=# class="text-decoration-none">@ludk</a></footer>
                        </p>
                        <a href="#" class="btn btn-primary">Copy</a>
                    </div>
                </div>
                <div class="card card-block">
                    <div class="card-body">
                        <h5 class="card-title">Foreach Loop <span class="badge badge-secondary lg-php">PHP</span></h5>
                        <pre><code class="php">&#x3C;?php

foreach ($array as $key => $value) {
    echo &#x22;$key : $value.\n&#x22;;
}
                        </code></pre>
                        <p class="card-text">
                            A simple foreach example.
                            <footer class="blockquote-footer"><a href=# class="text-decoration-none">@someone</a>
                            </footer>
                        </p>
                        <a href="#" class="btn btn-primary">Copy</a>
                    </div>
                </div>
                <div class="card card-block">
                    <div class="card-body">
                        <h5 class="card-title">Check os version <span class="badge badge-secondary lg-sh">SH</span>
                        </h5>
                        <pre><code class="shell">$ cat /etc/os-release
                        </code></pre>
                        <p class="card-text">
                            The easy way to check you os version.
                            <footer class="blockquote-footer"><a href=# class="text-decoration-none">@linn489</a>
                            </footer>
                        </p>
                        <a href="#" class="btn btn-primary">Copy</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 masonry-column">
                <div class="card card-block">
                    <div class="card-body">
                        <h5 class="card-title">Bubble Sort <span class="badge badge-secondary lg-python">Python</span>
                        </h5>
                        <pre><code class="python">def bubbleSort(arr):
    n = len(arr)
    for i in range(n):
        for j in range(0, n-i-1):
            if arr[j] &#x3E; arr[j+1] :
                arr[j], arr[j+1] = arr[j+1], arr[j]
    return arr
                        </code></pre>
                        <p class="card-text">
                            Implementation of Bubble Sort - O(n²).
                            <footer class="blockquote-footer"><a href=# class="text-decoration-none">@neo7114</a>
                            </footer>
                        </p>
                        <a href="#" class="btn btn-primary">Copy</a>
                    </div>
                </div>
                <div class="card card-block">
                    <div class="card-body">
                        <h5 class="card-title">Async function <span class="badge badge-secondary lg-js">Javascript</span>
                        </h5>
                        <pre><code class="javascript">function delayedFunction() {
    alert('Hello');
}
setTimeout(delayedFunction, 3000);
                        </code></pre>
                        <p class="card-text">
                            A delayed call in javascript.
                            <footer class="blockquote-footer"><a href=# class="text-decoration-none">@jsman</a>
                            </footer>
                        </p>
                        <a href="#" class="btn btn-primary">Copy</a>
                    </div>
                </div>
                <div class="card card-block">
                    <div class="card-body">
                        <h5 class="card-title">Interface definition <span class="badge badge-secondary lg-ts">Typescript</span>
                        </h5>
                        <pre><code class="typescript">interface Person {
    fullName: string;
    toString();
}
                        </code></pre>
                        <p class="card-text">
                            Simple interface definition.
                            <footer class="blockquote-footer"><a href=# class="text-decoration-none">@roxxx8</a>
                            </footer>
                        </p>
                        <a href="#" class="btn btn-primary">Copy</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 masonry-column">
                <div class="card card-block">
                    <div class="card-body">
                        <h5 class="card-title">Simple Thread <span class="badge badge-secondary lg-java">Java</span>
                        </h5>
                        <pre><code class="java">public class MyThread extends Thread {
    public void run(){
        System.out.println(&#x22;MyThread running&#x22;);
    }
}
    
MyThread myThread = new MyThread();
myTread.start();
                        </code></pre>
                        <p class="card-text">
                            A basic thread implementation.
                            <footer class="blockquote-footer"><a href=# class="text-decoration-none">@javabien</a>
                            </footer>
                        </p>
                        <a href="#" class="btn btn-primary">Copy</a>
                    </div>
                </div>
                <div class="card card-block">
                    <div class="card-body">
                        <h5 class="card-title">Properties definition <span class="badge badge-secondary lg-csharp">C#</span>
                        </h5>
                        <pre><code class="csharp">public class SaleItem
{
   public string Name { get; set; }
   public decimal Price { get; set; }
}
                        </code></pre>
                        <p class="card-text">
                            How to define properties.
                            <footer class="blockquote-footer"><a href=# class="text-decoration-none">@skraken</a>
                            </footer>
                        </p>
                        <a href="#" class="btn btn-primary">Copy</a>
                    </div>
                </div>
                <div class="card card-block">
                    <div class="card-body">
                        <h5 class="card-title">Group by Query <span class="badge badge-secondary lg-sql">SQL</span>
                        </h5>
                        <pre><code class="sql">SELECT SUBJECT, YEAR, Count(*)
FROM Student
GROUP BY SUBJECT, YEAR;
                        </code></pre>
                        <p class="card-text">
                            Group by example.
                            <footer class="blockquote-footer"><a href=# class="text-decoration-none">@ssqqll</a>
                            </footer>
                        </p>
                        <a href="#" class="btn btn-primary">Copy</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script src="js/highlight.pack.js"></script>
    <script src="js/script.js"></script>
    <script>
        hljs.initHighlightingOnLoad();
    </script>
</body>

</html>