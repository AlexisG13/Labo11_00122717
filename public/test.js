tasks();
                    document.querySelector("#addTask").addEventListener('submit', function (e) {
                        e.preventDefault();
                        var url = 'http://localhost/task/api/createTask.php';
                        var data = {
                            task: document.forms['addTask']['task'].value,
                            date: document.forms['addTask']['date'].value
                        };
                        fetch(url, {
                            method: 'POST',
                            body: JSON.stringify(data),
                            headers:
                            {
                                'Content-Type': 'application/json'
                            }
                        }).then(res => res.json())
                            .catch(error => console.error('Error:', error))
                            .then(function (response) {
                                console.log({ "Success": response.message });
                                tasks();
                            });
                    });
                    document.querySelector("#updateTask").addEventListener('submit', function (e) {
                        e.preventDefault();
                        var url = 'http://localhost/task/api/updateTask.php';
                        var data = {
                            id: document.forms['updateTask']['idU'].value,
                            task: document.forms['updateTask']['taskU'].value,
                            date: document.forms['updateTask']['dateU'].value
                        };
                        fetch(url, {
                            method: 'PUT',
                            body: JSON.stringify(data),
                            headers:
                            {
                                'Content-Type': 'application/json'
                            }
                        }).then(res => res.json())
                            .catch(error => console.error('Error:', error))
                            .then(function (response) {
                                console.log({ "Success": response.message });
                                tasks();
                            });
                    });
                    function tasks() {
                        let tableTask = document.querySelector('#tareas');
                        let infoTask = "";
                        fetch('http://localhost/task/api/tasks.php')
                            .then(function (response) {
                                return response.text();
                            }).then(function (data) {
                                JSON.parse(data).forEach(element => {
                                    infoTask = infoTask + `<tr>
                                        <td>${element.id}</td>
                                        <td>${element.task}</td>
                                        <td>${element.date_task}</td>
                                        <td>
                                            <a href="http://localhost/task/api/task.php/${element.id}" class="update btn btn-primary btn-sm update" data-toggle="modal" data-target="#update">Actualizar</a>
                                            <a href="http://localhost/task/api/deleteTask.php/${element.id}" class="delete btn btn-danger btn-sm">Eliminar</a>
                                        </td>
                                    </tr>`;
                                });
                                tableTask.innerHTML = infoTask;
                                let deletes = document.querySelectorAll(".delete");
                                deletes.forEach(item => {
                                    let context = this;
                                    item.addEventListener('click', function (e) {
                                        e.preventDefault();
                                        let url = this['href'];
                                        fetch(url, {
                                            method: 'delete'
                                        }).then(response => response.json())
                                            .catch(error => console.error('Error:', error))
                                            .then(function (response) {
                                                console.log({ "Success": response.message });
                                                tasks();
                                            });
                                    });
                                });
                                let updates = document.querySelectorAll(".update");
                                updates.forEach(item=>{
                                    item.addEventListener("click",function(e){
                                        e.preventDefault();
                                        let url = this['href'];
                                        fetch(url,{
                                            method: "get"
                                        }).then(function(response){
                                            return response.text();
                                        }).then(function(data){
                                            let task = JSON.parse(data);
                                            let formUpdateTask = document.querySelector('#updateTask');
                                            formUpdateTask.idU.value=task.id;
                                            formUpdateTask.taskU.value = task.task;
                                            formUpdateTask.dateU.value = task.date_task;
                                            console.log(formUpdateTask.taskU);
                                            tasks();
                                        });
                                    });
                                });
                            }).catch(function (err) {
                                console.log(err);
                            })
                    }
