export const memberships = (state) => state.memberships

export const membership = (state) => state.membership

export const membershipTypes = (state) => state.membership !== null ? state.membership.membershipTypes: ''
