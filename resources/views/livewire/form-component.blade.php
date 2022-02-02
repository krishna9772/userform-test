    <div class="continer mt-5">
        <div class="card">
            <div class="card-header">
            Form
            </div>
            <div class="card-body">
            <p class="card-title">Check your fields for the form</p>
                <div class="row">
                    <div class="col-sm-3">
                        <input type="checkbox"  checked name="inlineRadioOptionsWeek" id="Checkbox3" value="name" onclick="return false;">  Name
                    </div>
                    <div class="col-sm-3">
                        <label class="radio-inline">
                            <input type="checkbox" name="inlineRadioOptionsWeek" id="Checkbox3" value="phone">  Phone
                        </label>
                    </div>
                    <div class="col-sm-3">
                        <label class="radio-inline">
                            <input type="checkbox" name="inlineRadioOptionsWeek" id="Checkbox3" value="dob">  Date of Birthday
                        </label>
                    </div>
                    <div class="col-sm-3">
                        <label class="radio-inline">
                            <input type="checkbox" name="inlineRadioOptionsWeek" id="Checkbox3" value="gender">  Gender
                        </label>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-sm-6">
            @if(Session::has('success'))
            <div class="alert alert-success mt-2">
                {{Session::get('success')}}
            </div>
            @endif

            <form id="form" method="post" action="{{ route('form.store') }}">
                @csrf

                <div class="form-group" id="default-input">
                  <label for="exampleInputEmail1">Name</label>
                  <input type="text" class="form-control" name="name" aria-describedby="emailHelp">
                  <input type="hidden" class="form-control" valut={{ auth()->user()->name }} name="username" aria-describedby="emailHelp">
                  <input type="hidden" class="form-control" value={{ auth()->user()->email }} name="email" aria-describedby="emailHelp">

                  @if ($errors->has('name'))
                    <span class="text-danger">
                        {{ $errors->first('name') }}
                    </span>
                  @endif
          
                </div>

                <input type="submit" value="submit" class="btn btn-primary" style="color:#000;background:#f1f1f1;"/>
            </form>
        </div>
    </div>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
{{-- @livewireScripts --}}
<script>
    $("input[type='checkbox']").on('click',function () {
        var status = this.checked;
        var value = this.value;
        
        if (status == true){ 
            switch(value) {
                case 'phone':
                    $('<div/>').addClass('form-group phone')
                    .append( $('<label for="phone"/>').text('Phone Number'))
                    .append( $('<input type="tel" name="phone" placeholder="Eg:1234567890"/>').addClass( 'form-control' ))
                    .insertAfter('#default-input');
                    break;
                case 'dob':
                    $('<div/>').addClass('form-group dob')
                    .append( $('<label for="Date for birth"/>').text('Date of Birth'))
                    .append( $('<input type="date" name="dob"/>').addClass( 'form-control' ))
                    .insertAfter('#default-input');
                    break;
                case 'gender':
                    $('<div/>').addClass('form-group gender')
                    .append($('<label for="Male"/>').text('Male').addClass('radio-inline'))
                    .append($('<input>').prop({ type: 'radio',id: 'gender',name: 'gender',value: '1', class: 'form-control'}))
                    .append($('<label for="Female"/>').text('Female').addClass('radio-inline'))
                    .append($('<input>').prop({ type: 'radio',id: 'gender',name: 'gender',value: '0', class: 'form-control'}))
                    .insertAfter('#default-input');
                    break;
            }
        }else{
            switch(value){
                case 'phone':
                    $('.phone').empty();
                    break;
                case 'dob':
                    $('.dob').empty();
                    break;
                case 'gender':
                    $('.gender').empty();
                    break;
            }
        }
    });
</script>
