<!-- change_status -->
<div class="modal fade" id="Payment_status_change{{$invoice->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ trans('Backend/invoices.Change payment status') }}  </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('Payment_status_change')}}" method="post" autocomplete="off">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="invoice_id" id="invoice_id" value="{{$invoice->id}}">

                    <div class="col">
                        <label for="exampleFormControlSelect1">{{ trans('Backend/invoices.Payment status') }} </label>
                        <select class="form-control" name="status" id="status">
                            <option value="" selected disabled>{{ trans('Backend/invoices.Choose from the list') }}</option>
                            <option value=1>{{ trans('Backend/invoices.Unpaid') }} </option>
                            <option value=2>{{ trans('Backend/invoices.Paid') }}</option>
                        </select>
                    </div>

                    <div id="payment">
                        <div class="col">
                            <label> {{ trans('Backend/invoices.Payment Date') }}</label>
                            <input class="form-control" type="text"  id="datepicker-action" name="payment_date" data-date-format="yyyy-mm-dd" title="{{ trans('Backend/invoices.Please enter the payment date')}}">
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('Backend/invoices.Close') }}</button>
                    <button type="submit" class="btn btn-danger">{{ trans('Backend/invoices.Confirm') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
