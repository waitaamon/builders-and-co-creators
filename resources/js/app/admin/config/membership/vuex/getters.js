export const memberships = (state) => state.memberships

export const membership = (state) => state.membership

export const membershipTypes = (state) => state.membership !== null ? state.membership.membershipTypes: ''

export const membershipType = (state) => state.membershipType !== null ? state.membershipType: ''
