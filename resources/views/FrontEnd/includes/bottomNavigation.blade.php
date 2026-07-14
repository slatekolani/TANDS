<style>
    /* .navbar {
  background-color: #333;
  overflow: hidden;
  position: fixed;
  bottom: 0;
  width: 100%;
}

.navbar a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.navbar a:hover {
  background-color: #ddd;
  color: black;
}

.navbar a.active {
  background-color: #04AA6D;
  color: white;
} */

    .navbar {
        background: linear-gradient(to right, #007bff, #323366);
        overflow: hidden;
        position: fixed;
        bottom: 0;
        width: 100%;
        display: flex;
        justify-content: center;
        z-index: 1000;
    }

    .navbar a {
        float: left;
        display: block;
        color: #f2f2f2;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        font-size: 17px;

    }

    .navbar a:hover {
        background-color: #ddd;
        color: black;
    }

    .navbar a.active {
        background-color: white;
        color: dodgerblue;
    }
</style>

<div class="navbar">
    <a href="{{route('TNDC2026')}}" class="active">What's Up Next?</a>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
