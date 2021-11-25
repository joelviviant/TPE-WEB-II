{lts}}
<div id="remarks">

    <h2>Remarks</h2>
    <p v-if="remarks.length == 0">Not remarks</p>

    <div v-if="remarks.length > 0" style="margin-bottom: 5%;">
        <button class="btn btn-link" v-on:click="orderQualification()">Order by Qualification &nbsp; <img
                v-if="orderQualification == 'up'" src="https://img.icons8.com/plumpy/16/000000/up--v1.png" />
            <img v-if="orderQualification == 'down'" src="https://img.icons8.com/plumpy/16/000000/down--v1.png" /> </button>
        <button class="btn btn-link" v-on:click="orderDate()"> Order by date <img
                v-if="orderDate == 'up'" src="https://img.icons8.com/plumpy/16/000000/up--v1.png" />
            <img v-if="orderDate == 'down'" src="https://img.icons8.com/plumpy/16/000000/down--v1.png" />
        </button>
        <ul>
            <li v-for="remark in remarks">
                {{remark.name}}, {{remark.mail}} -
                {{remark.qualification}} -
                {{remark.remark}}

                <button class="btn" v-if="isAdmin" v-on:click.prevent="DeleteRemark(remark.id_remark)"> <a
                        class="btn btn-danger">Delete</a>
                </button>
            </li>

        </ul>
    </div>
    <p id="message">{{message}}</p>
</div>
{/lts}