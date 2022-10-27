let table = $('#page_table_slider').DataTable({
    serverSide: true,
    ajax: `${root}/get-list`,
    bSort: true,
    order: [],
    destroy: true,
    columns: [
        { data: "name" },
        { data: "image" },
        { data: "order" },
        { data: 'actions', name: 'actions', orderable: false, searchable: false }
    ],
    language: {
        url: "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json",
    }, 
});

function dataSliderContent(content)
{
    let form = document.getElementById('form-update-slider')
    form.reset()
    form.querySelector('input[name="id"]').setAttribute('value', content.id)

    if (content.order) 
        form.querySelector('input[name="order"]').setAttribute('value', content.order)
    
    form.querySelector('input[name="name"]').setAttribute('value', content.name)

    if (content.color) 
        form.querySelector('input[name="color"]').setAttribute('value', content.color)

    if (content.outstanding) 
        form.querySelector('input[name="outstanding"]').click()
    
        
}

