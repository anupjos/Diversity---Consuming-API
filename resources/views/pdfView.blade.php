<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  </head>
  <body>
    <table class="table table-bordered">
    <thead>
      <tr class="table-success">
        <td class="text-center">Result</td>
      </tr>
      </thead>
      <tbody>
        @if ($result)
            <tr>
                <td class="text-center">Full Name: {{ $result['fullname'] }}</td>
            </tr>
            <tr>
                <td class="text-center">Ethnicity: {{ $result['ethnicity'] }}</td>
            </tr>
            <tr>
                <td class="text-center">Ethnicity Probability: {{ $result['ethnicity probability'] }}</td>
            </tr>
        @endif
      </tbody>
    </table>
  </body>
</html>