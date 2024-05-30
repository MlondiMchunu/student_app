document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('student-form');
    const studentsTable = document.getElementById('students-table').getElementsByTagName('tbody')[0];
    let editMode = false;
    let editId = null;

    form.addEventListener('submit', async (e) => {
        e.preventDefault();
        const name = document.getElementById('name').value;
        const email = document.getElementById('email').value;
        const age = document.getElementById('age').value;
        const major = document.getElementById('major').value;

        if (editMode) {
            await updateStudent(editId, name, email, age, major);
        } else {
            await createStudent(name, email, age, major);
        }
        form.reset();
        editMode = false;
        editId = null;
        loadStudents();
    });

    async function loadStudents() {
        const response = await fetch('student.php');
        const students = await response.json();
        studentsTable.innerHTML = '';
        students.forEach(student => {
            const row = studentsTable.insertRow();
            row.insertCell(0).innerText = student.id;
            row.insertCell(1).innerText = student.name;
            row.insertCell(2).innerText = student.email;
            row.insertCell(3).innerText = student.age;
            row.insertCell(4).innerText = student.major;
            const actionsCell = row.insertCell(5);
            const editButton = document.createElement('button');
            editButton.innerText = 'Edit';
            editButton.onclick = () => editStudent(student);
            const deleteButton = document.createElement('button');
            deleteButton.innerText = 'Delete';
            deleteButton.onclick = () => deleteStudent(student.id);
            actionsCell.appendChild(editButton);
            actionsCell.appendChild(deleteButton);
        });
    }

    async function createStudent(name, email, age, major) {
        await fetch('students.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ name, email, age, major })
        });
    }

    async function updateStudent(id, name, email, age, major) {
        await fetch('students.php', {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ id, name, email, age, major })
        });
    }

    async function deleteStudent(id) {
        await fetch(`students.php?id=${id}`, {
            method: 'DELETE'
        });
        loadStudents();
    }

    function editStudent(student) {
        document.getElementById('name').value = student.name;
        document.getElementById('email').value = student.email;
        document.getElementById('age').value = student.age;
        document.getElementById('major').value = student.major;
        editMode = true;
        editId = student.id;
    }

    loadStudents();
});
