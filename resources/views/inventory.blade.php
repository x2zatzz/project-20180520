@extends('layouts.base')

@section('body')

  <main class="container-fluid {{"$webheader-$role"}}">
    @switch($role)
      @case('manager')
      <div class="summary">
        <table>
          <thead>
            <tr>
              <th>header 1</th>
              <th>header 2</th>
              <th>header 3</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td></td>
            </tr>
          </tbody>


        </table>
      </div>
      @case('staff')

    @endswitch

  </main>

@endsection