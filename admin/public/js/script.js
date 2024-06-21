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
      
    const on = (type, el, listener, all = false) => {
      if (all) {
        select(el, all).forEach(e => e.addEventListener(type, listener))
      } else {
        select(el, all).addEventListener(type, listener)
      }
    }

    const findOptionByText = (selectElement, text) => {
      const options = selectElement.options;
      for (let i = 0; i < options.length; i++) {
        if (options[i].text === text) {
          return options[i];
        }
      }
      return null; 
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

    on('show.bs.modal', '#editModal', function (e) {
      const button = e.relatedTarget
      const id = button.getAttribute('data-id')
      const title = button.getAttribute('data-title')
      const category = button.getAttribute('data-category')
      
      document.getElementById("idEdit").value = id
      document.getElementById("titleEdit").value = title
      const option = findOptionByText(document.getElementById("categoryEdit"), category);
      if (option) {
        option.selected = true;
      } 
    })

    on('show.bs.modal', '#deleteModal', function (e) {
      const button = e.relatedTarget
      const id = button.getAttribute('data-id')
      const title = button.getAttribute('data-title')

      document.getElementById("idDelete").value = id
      document.getElementById("titleDelete").innerHTML = '"' + title + '"?'
    })

    const target = select('.datatable-dropdown')
    target.innerHTML = "<button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#createModal'>+ Tambah Data</button>"
})();