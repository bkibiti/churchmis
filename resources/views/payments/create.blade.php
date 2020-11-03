@extends("layouts.master")

@section('page_css')

@endsection

@section('content-header')
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0 text-dark ">Add Payment</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
   
    </div><!-- /.col -->
  </div><!-- /.row -->
</div><!-- /.container-fluid -->
@endsection

@section('content')
<div class="container-fluid">

  <div class="row">
    <div class="col-md-12">
      <div class="card card-info">
        <div class="card-header">
          <h3 class="card-title">Payment Info</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-horizontal" action="{{route('payments.store')}}" method="POST">
          @csrf
          <div class="card-body">

            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Payment Category<font color="red">*</font></label>
              <div class="col-sm-4">
                    <select class="form-control select2" id="pledged" name ="pledged" >
                        <option value="1">New Payment</option>
                        <option value="2">Pledge Payment</option>
                  </select>
              </div>
            </div>

          <!-- Paymet without previous pledge -->
            <div class="form-group row" id="pledger_div">
              <label class="col-sm-2 col-form-label">Payer Type<font color="red">*</font></label>
              <div class="col-sm-4">
                    <select class="form-control select2" id="pledger" name ="pledger" required>
                        <option value="">Select Type</option>
                        <option value="Person">Person</option>
                        <option value="Family">Family</option>
                        <option value="Group">Group</option>
                  </select>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Activity<font color="red">*</font></label>
              <div class="col-sm-10">
                    <select class="form-control select2" id="activity_id" name ="activity_id" required>
                        <option value="">Select Activity</option>
                      @foreach ($fundActivity as $a)
                        <option value={{$a->id}} >{{$a->name}}</option>
                      @endforeach
                  </select>
              </div>
            </div>
            <div id="pledger_group_div">
            <div class="form-group row" id="person">
              <label class="col-sm-2 col-form-label">Person<font color="red">*</font></label>
              <div class="col-sm-10">
                  <select class="form-control select2" id="person_id" name ="person_id" >
                      <option value="">--Select Person--</option>
                      @foreach($person as $p)
                      @php
                          $address = '';
                          if ($p->address <> '') {
                            $address =', from  '. $p->address;
                          }
                      @endphp
                      <option value="{{ $p->id }}"}}>{{ $p->first_name .' ' . $p->last_name .' '. $address  }}</option>
                    @endforeach
        
                  </select>
              </div>
            </div>

            <div class="form-group row" id="family">
              <label class="col-sm-2 col-form-label">Family<font color="red">*</font></label>
              <div class="col-sm-10">
                  <select class="form-control select2" id="family_id" name ="family_id" >
                      <option value="">--Select Family--</option>
                      @foreach($family as $f)
                        @php
                          $address = '';
                          if ($f->address <> '') {
                            $address =', from  '. $f->address;
                          }
                        @endphp
                        <option value="{{ $f->id }}"}}>{{ $f->name . ' '. $address  }}</option>
                      @endforeach
                  </select>
              </div>

            </div>
            <div class="form-group row" id="group">
              <label class="col-sm-2 col-form-label">Group<font color="red">*</font></label>
              <div class="col-sm-10">
                  <select class="form-control select2" id="group_id" name ="group_id" >
                      <option value="">--Select Group--</option>
                      @foreach($group as $g)
                        <option value="{{ $g->id }}"}}>{{ $g->name }}</option>
                      @endforeach
                  </select>
              </div>
            </div>
            </div>

            <div class="form-group row" id="pledger_name">
              <label class="col-sm-2 col-form-label">Pledge From<font color="red">*</font></label>
              <div class="col-sm-10">
                  <select class="form-control select2" id="pledge_id" name ="pledge_id" >
                    
                  </select>
              </div>
            </div>

            <div class="form-group row" >
              <label class="col-sm-2 col-form-label">Payment Date <font color="red">*</font></label>
              <div class="col-sm-4">
                <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                  <input type="text" class="form-control datetimepicker-input" id='pay_date' name='pay_date' data-target="#datetimepicker1"/>
                  <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                      <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                  </div>
              </div>
              </div>
                <label class="col-sm-2 col-form-label">Amount <font color="red">*</font></label>
                  <div class="col-sm-4">
                    <input type="number" class="form-control"  name="amount"  id="amount">
                  </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Payment Method<font color="red">*</font></label>
              <div class="col-sm-10">
                    <select class="form-control select2" id="payment_method_id" name ="payment_method_id" required>
                      @foreach ($paymentMethod as $p)
                        <option value={{$p->id}} >{{$p->name}}</option>
                      @endforeach
                  </select>
              </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Comment</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control"  name="comment"  id="comment">
                </div>
            </div>

     
     
          

          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-info float-right">Save</button>
           
            <a href="{{route('payments.index')}}">
              <button type="button" class="btn btn-danger ">Cancel</button>
           </a>
          </div>
          <!-- /.card-footer -->
        </form>
      </div>
      <!-- /.card -->
     
    </div>
  
  </div>
 
</div><!-- /.container-fluid -->
@endsection

@push("page_scripts")

@include('partials.notification')

<script>
    $('#person').hide();
    $('#family').hide();
    $('#group').hide();
    $('#pledger_name').hide();

    $(document).ready(function(){
        $('.select2').select2()
      
    });


    $(function () {
        $('#datetimepicker1').datetimepicker({
            format: 'DD/MM/YYYY',
        });
    });

    $('#pledged').on('select2:selecting', function(e) {
        var id = e.params.args.data.id;
        if (id == '1') {
          $('#pledger_group_div').show();
          $('#pledger_div').show();
          $('#pledger_name').hide();
        }

        if (id == '2') {
          $('#pledger_group_div').hide();
          $('#pledger_div').hide();
          $('#pledger_name').show();
          $('#person_id').prop('required',false);
          $('#family_id').prop('required',false);
          $('#group_id').prop('required',false);
          $('#pledger').prop('required',false);
        }
  
     });

    $('#pledger').on('select2:selecting', function(e) {
        var id = e.params.args.data.id;
        if (id == 'Person') {
          $('#person_id').prop('required',true);
          $('#family_id').prop('required',false);
          $('#group_id').prop('required',false);
          $("#group_id option:selected").prop("selected", false);
          $("#person_id option:selected").prop("selected", false);
          $("#family_id option:selected").prop("selected", false);
          $('#person').show();
          $('#family').hide();
          $('#group').hide();
        }

        if (id == 'Family') {
          $('#person_id').prop('required',false);
          $('#family_id').prop('required',true);
          $('#group_id').prop('required',false);
          $("#group_id option:selected").prop("selected", false);
          $("#person_id option:selected").prop("selected", false);
          $("#family_id option:selected").prop("selected", false);
          $('#person').hide();
          $('#family').show();
          $('#group').hide();
        }
        if (id == 'Group') {
          $('#person_id').prop('required',false);
          $('#family_id').prop('required',false);
          $('#group_id').prop('required',true);
          $("#group_id option:selected").prop("selected", false);
          $("#person_id option:selected").prop("selected", false);
          $("#family_id option:selected").prop("selected", false);
          $('#person').hide();
          $('#family').hide();
          $('#group').show();
        }
  
     });

     //on change of activity load pledges for this activity
    
     $('#activity_id').on('select2:selecting', function(e) {
        if ($('#pledged').val() =="2") {
          var id = e.params.args.data.id;
          var _token = $('input[name="_token"]').val();
            $.ajax({
                url:"{{route('payments.pledges')}}",
                method:"POST",
                data:{_token:_token,activity_id: id },
                success:function(result)
                {
                    $('#pledge_id').html(result);
                }         
          })
        }
  
    });




</script>


@endpush
