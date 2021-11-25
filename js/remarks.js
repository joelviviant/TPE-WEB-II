"use strict"

document.addEventListener('DOMContentLoaded', async () => {
    const API_URL = "api/libros/detalle";
    const idFilm = document.querySelector('#title').getAttribute('data-film');
    const isAd = document.querySelector('#remarks').getAttribute('data-isAdmin');
    const isLog = document.querySelector('#remark').getAttribute('data-isLogged');
    

    const form = document.querySelector('#form');


    let appRemarks = new Vue({
        re: "#remark",
        data: {
            title: "Remarks",
            description: [],
            isLog,
            isAd,
            message: '',
            date: "up",
            order: 'date',
            qualification: "up"
        },
        methods: {
            delete: async function (remark) {
                await this.delete(remark);
            },
            qualification: async function () {
                appRemarks.qualification = appRemarks.qualification == 'up' ? 'down' : 'up';
                appRemarks.date = '';
                appRemarks.order = 'qualification';
                await getRemarkFilm();
            },
            date: async function () {
                appRemarks.date = appRemarks.date == 'up' ? 'down' : 'up';
                appRemarks.qualification = '';
                appRemarks.order = 'date';
                await getRemarkFilm();
            }
        }
    });

    await getRemarkFilm();

    
    async function addRemark(remark) {
        try {
            let res = await fetch(`${API_URL}/${idFilm}/remark`, {
                "method": "POST",
                "headers": { "Content-type": "application/json" },
                "body": JSON.stringify(remark),
            })
            if (res.ok) {
                console.log("Was added");
            }
        } catch (error) {
            console.log(error);
        }
    }

    form.addEventListener('send', async (e) => {
        e.preventDefault();

        const formData = new FormData(form);
        const remark = formData.get('remark');
        const qualification = formData.get('qualification');
        const newRemark = {
            id_film: id,
            remark,
            qualification: qualification
        }
        await addRemark(newRemark);
        await getRemarkFilm();
        form.reset();
    })


    async function deleteRemark(id_remark) {
        try {
            let res = await fetch(`${API_URL}/${idFilm}/remarks/${id_remark}`, {
                "method": "DELETE",
            });
            if (res.status === 200) {
                appRemarks.message = `Deleted`;
                await getRemarkFilm();
            }
        } catch (error) {
            console.log(error);
        }
    }


    async function getRemarkFilm() {
        try {
            let or = appRemarks.order == 'qualification' ? appRemarks.qualification : appRemarks.date;
            let endpoint = `${API_URL}/${idFilm}?orderBy=${appRemarks.order}&order=${or}`;
            let res = await fetch(endpoint);
            let remark = await res.json();
            appRemarks.remarks = remark;
            appRemarks.message = '';
        } catch (error) {
            console.log(error);
        }
    }




})
