// fetch('api/peaple', {
//     method: 'GET',
//     headers: {
//         'Content-Type': 'application/json',
//         'Accept': 'application/json',
//     },
// })
// .then(response => response.json())
// .then(data => {
//     const tabela = document.getElementById('tabela').getElementsByTagName('tbody')[0];
//     tabela.innerHTML = '';
//     data.forEach(person => {
//         const newRow = tabela.insertRow();
//         newRow.innerHTML = `
//             <td>${person.id}</td>
//             <td>${person.codigo}</td>
//             <td>${person.name}</td>
//             <td>${person.cpf}</td>
//             <td>${person.email}</td>
//             <td>${person.categoria}</td>
//             <td>${person.classificacao}</td>
//             <td>
//                 <div class="row">
//                 <div class="col-sm-12">
//                     <a class="icon edit-icon" href="/cadastro/${person.id}">
//                         <img class="icon" src="icon/feature-edit.svg" alt="Editar">
//                     </a>
//                     <img class="icon delete-icon" src="icon/feature-delete.svg" alt="Excluir" data-id="${person.id}">
//                 </div>
//                 </div>
//             </td>
//         `;
//     });

// // Adicionar evento de clique para os botões de exclusão
// const deleteButtons = document.querySelectorAll('.delete-icon');
// deleteButtons.forEach(button => {
//     button.addEventListener('click', function() {
//         const id = this.getAttribute('data-id');
//         console.log('Botão de exclusão clicado para o ID:', id);
//         fetch(`/api/peaple/${id}`, {
//             method: 'DELETE',
//             headers: {
//                 'Content-Type': 'application/json',
//                 'Accept': 'application/json',
//             },
//         })
//         .then(response => response.json())
//         .then(data => {
//             // Remover a linha correspondente da tabela
//             const row = this.closest('tr');
//             tabela.removeChild(row);
//         })
//         .catch(error => {
//             console.error('Erro na exclusão:', error);
//         });
//     });
// });

// carregar datatable
$(document).ready(function() {
    $('#tabela').DataTable({
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/pt-PT.json'
        },
        
    });
});

// })
// .catch(error => {
// console.error('Erro na requisição:', error);
// });


