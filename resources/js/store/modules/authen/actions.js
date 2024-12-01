export const SET_LOGIN_INFO = ({commit},data)=>{
    commit('SET_USER', data.user)
    commit('IS_ADMIN', data.user.is_admin)
    commit('IS_AUTHENTICATED', 1);
    localStorage.setItem('is_authenticated', 1);
}

export const SET_LOGOUT_STEPS = ({commit}) =>{
    commit('SET_USER', '')
    commit('IS_ADMIN', '')
    commit('IS_AUTHENTICATED', '');
    localStorage.removeItem('is_authenticated');
}