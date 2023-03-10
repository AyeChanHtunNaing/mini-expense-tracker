<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini Expense Tracker</title>
    <link href="
         https://cdn.jsdelivr.net/npm/argon-design-system-free@1.2.0/assets/css/argon-design-system.min.css
         " rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  </head>
  <body>
    <div class="container mt-5">
      <h3 class="text-center">Mini Expense Tracker</h3>
      <div class="row">
        <div class="col-12">
          <div class="card card-body">
               @if(session()->has('success'))
                <div class="alert alert-success">registered</div>
              @endif
            <form action="/" method="post">
                @csrf
              <input type="text" class="btn btn-dark text-white" name="desc" placeholder="Description">
              <input type="number" class="btn btn-dark text-white" name="amount" placeholder="Amount">
              <input type="date" class="btn btn-dark text-white" value="date" name="date">
              <select name="type" class="btn btn-dark">
                <option value="income">Income</option>
                <option value="expense">Expense</option>
              </select>
              <input type="submit" class="btn btn-success" value="Register">
            </form>
          </div>
        </div>
       
        <div class="col-6">
         
            <ul class="list-group mt-3">
            @foreach($data as $d)
              <li class="list-group-item d-flex justify-content-between">
                <div class="">{{$d->desc}} <br>
                  <small class="text-muted">{{$d->date}}</small>
                </div>
                @if($d->type=='income')
                <small class="text text-success">
                   + {{$d->amount}} Ks
                </small>
                @else
                <small class="text text-danger">
                  - {{$d->amount}} Ks
               </small>
                @endif
              </li>
              @endforeach
            </ul>
          
        </div>
        <div class="col-6">
          <div class="card card-body mt-3">
            <div class="d-flex justify-content-between">
              <h5>Summary for Today</h5>
              <div>
                <small class="text-success">Income : + {{$total_income}}Ks</small>
                <small class="text-danger ml-3">Expense : - {{$total_expense}} Ks</small>
              </div>
            </div>
            <hr class="p-0 m-0" />
            <div class="mt-3">
              <canvas id="myChart"></canvas>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
  <script>
    const ctx = document.getElementById('myChart');
    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ['9 Feb', '10 Feb', '11 Feb', '12 Feb', '13 Feb', '14 Feb'],
        datasets: [{
          label: 'Income',
          data: [12, 19, 3, 5, 2, 3],
          borderWidth: 1,
          backgroundColor: '#2DCE89',
        }, {
          label: 'Expense',
          data: [16, 1, 2, 2, 6, 10],
          borderWidth: 1,
          backgroundColor: '#F5265C',
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
  </script>
</html>