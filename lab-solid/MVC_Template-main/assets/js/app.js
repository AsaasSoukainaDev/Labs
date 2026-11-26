const form          = document.getElementById("form-discipline");
const sectionForm   = document.getElementById("section-form");
const btnAjouter    = document.getElementById("btn-show-form");
const btnAnnuler    = document.getElementById("btn-cancel-form");
const tbody         = document.getElementById("table-disciplines-body");
const btnEnregister = document.getElementById("enregister");
const api           = "http://localhost:8081/backend/api/api.php";

function Loading(isloading) {
    if (isloading) {
        btnEnregister.disabled = true;
        btnEnregister.textContent = "En cours ...";
    } else {
        btnEnregister.disabled = false;
        btnEnregister.textContent = "Enregistrer";
    }
}

function Toast(message, type = "success") {
    const toastContainer = document.getElementById("toast-container");
    const toast = document.createElement("div");
    const color = type == "success" ? 'bg-green-500' : 'bg-red-500';

    toast.className = `${color} px-5 py-4 text-white transition-opacity duration-500`;
    toast.textContent = `${message}`;
    toastContainer.appendChild(toast);
    setTimeout(() => {
        toast.style.opacity = 0;
        setTimeout(() => toast.remove(), 500);
    }, 3000);
}

function AfficherDisciplines() {
    fetch(api)
        .then(response => response.json())
        .then(data => {
            tbody.innerHTML = "";
            data.forEach(d => {
                const tr = document.createElement("tr");
                tr.innerHTML = `
                    <td class="px-4 py-3">${d.id_discipline}</td>
                    <td class="px-4 py-3">${d.libelle}</td>
                    <td class="px-4 py-3">${d.description}</td>
                `;
                tbody.appendChild(tr);
            });
        })
        .catch(error => {
            Loading(false);
            console.error(error);
        });
}

document.addEventListener("DOMContentLoaded", () => {
    AfficherDisciplines();

    form.addEventListener("submit", (e) => {
        e.preventDefault();
        Loading(true);

        fetch(api, {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({
                libelle:     document.getElementById("libelle").value,
                description: document.getElementById("description").value
            })
        })
        .then(response => response.json())
        .then(data => {
            if (!data.success) throw new Error(data.message);

            Loading(false);
            Toast(data.message);
            form.reset();
            AfficherDisciplines();
        })
        .catch(error => {
            Loading(false);
            Toast(error.message, "failed");
        });
    });
});

btnAjouter.addEventListener("click", () => sectionForm.classList.remove("hidden"));
btnAnnuler.addEventListener("click", () => {
    sectionForm.classList.add("hidden");
    form.reset();
});