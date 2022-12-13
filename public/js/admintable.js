"use Strict";
$(function () {
    //Blog category recycle data-table
    try{
        var table = $('#blog-recycle').DataTable({
            processing: true,
            serverSide: true,
            ajax: blogrecycle_url,
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'title',
                    name: 'title'
                },
               
                {
                    data: 'action',
                    name: 'action',
                    orderable: true,
                    searchable: true
                },
            ]
        });
    }catch(err){
        // no code
    }
    try{
            //Appointment recycle data-table
             var table = $('#appointment-recycle').DataTable({
            processing: true,
            serverSide: true,
            ajax: appointmentrecycle_url,
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'userid',
                    name: 'userid'
                },

                {
                    data: 'action',
                    name: 'action',
                    orderable: true,
                    searchable: true
                },
            ]
        });
    }
    catch(err){
        // no code
    }
    try{
        //Blog recycle data-table
        var table = $('#blogs-recycle').DataTable({
            processing: true,
            serverSide: true,
            ajax: blogsrecycle_url,
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'title',
                    name: 'title'
                },

                {
                    data: 'action',
                    name: 'action',
                    orderable: true,
                    searchable: true
                },
            ]
        });
    }
    catch(err){
        // no code
    }
    try{
        var table = $('#cost-recycle').DataTable({
            processing: true,
            serverSide: true,
            ajax: costrecycle_url,
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'cost',
                    name: 'cost'
                },
               
                {
                    data: 'action',
                    name: 'action',
                    orderable: true,
                    searchable: true
                },
            ]
        });
    }
    catch(err){
        // no code
    }
    try{
        var table = $('#diet-recycle').DataTable({
            processing: true,
            serverSide: true,
            ajax: dietrecycle_url,
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'user_id',
                    name: 'user_id'
                },
               
                {
                    data: 'action',
                    name: 'action',
                    orderable: true,
                    searchable: true
                },
            ]
        });
    }
    catch(err){
        // no code
    }
    try{
        var table = $('#diet-content').DataTable({
            processing: true,
            serverSide: true,
            ajax: dietcontentrecycle_url,
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'content',
                    name: 'content'
                },
               
                {
                    data: 'action',
                    name: 'action',
                    orderable: true,
                    searchable: true
                },
            ]
        });
    }
    catch(err){
        // no code
    }
    try{
        var table = $('#diethas-recycle').DataTable({
            processing: true,
            serverSide: true,
            ajax: diethas_url,
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'user_id',
                    name: 'user_id'
                },
               
                {
                    data: 'action',
                    name: 'action',
                    orderable: true,
                    searchable: true
                },
            ]
        });
    }
    catch(err){
        // no code
    }
    try{
        var table = $('#enq-recycle').DataTable({
            processing: true,
            serverSide: true,
        ajax: enquiryrecycle_url,
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: true,
                    searchable: true
                },
            ]
        });
     }
    catch(err){
        // no code
    }
    try{
        var table = $('#ex-recycle').DataTable({
            processing: true,
            serverSide: true,
            ajax: exercise_url,
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'userid',
                    name: 'userid'
                },
               
                {
                    data: 'action',
                    name: 'action',
                    orderable: true,
                    searchable: true
                },
            ]
        });
     }
    catch(err){
        // no code
    }
    try{
        
        var table = $('#exercisename-recycle').DataTable({
            processing: true,
            serverSide: true,
            ajax: exerecycle_url,
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'exercisename',
                    name: 'exercisename'
                },
               
                {
                    data: 'action',
                    name: 'action',
                    orderable: true,
                    searchable: true
                },
            ]
        });
     }
    catch(err){
        // no code
    }
    try{
        var table = $('#faq-recycle').DataTable({
            processing: true,
            serverSide: true,
            ajax: faqrecycle_url,
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'title',
                    name: 'title'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: true,
                    searchable: true
                },
            ]
        });
    }
    catch(err){
        // no code
    }
    try{
        var table = $('#fees-recycle').DataTable({
            processing: true,
            serverSide: true,
            ajax:  feerecycle_url,
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'title',
                    name: 'title'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: true,
                    searchable: true
                },
            ]
        });
   
    }
    catch(err){
        // no code
    }
});