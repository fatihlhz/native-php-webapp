(function() {
    "use strict";
    
    const select = (el, all = false) => {
        el = el.trim()
        if (all) {
          return [...document.querySelectorAll(el)]
        } else {
          return document.querySelector(el)
        }
    }
      
    const datatables = select('.datatable', true)
    datatables.forEach(datatable => {
        new simpleDatatables.DataTable(datatable, {
        perPageSelect: [5, 10, 15, ["All", -1]],
        columns: [
          {
            select: 2,
            sortSequence: ["desc", "asc"]
          },
          {
            select: 3,
            sortSequence: ["desc", "asc"]
          },
            {
            select: 4,
            sortSequence: ["desc", "asc"]
          }
        ]
        });
    })

    const target = select('.datatable-dropdown')
    target.innerHTML = "<button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#createModal'>+ Tambah Data</button>"
})();