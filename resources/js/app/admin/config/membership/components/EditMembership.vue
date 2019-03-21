<template>
    <div>
        <main-membership :membership_id="membership_id"></main-membership>
        <membership-type :membership_id="membership_id"></membership-type>
    </div>
</template>

<script>
    import MainMembership from "./partials/MainMembership";
    import MembershipType from "./partials/MembershipType";
    export default {
        name: 'edit-membership',
        props: ['membership_id'],
        components: {
            MembershipType,
            MainMembership
        }
    }
</script>