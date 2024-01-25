const axios = require('axios');

const baseUrl = process.env.MIX_APP_URL;
const httpClient = axios.create({
    baseURL: baseUrl + '/api',
    timeout: 15000,
    headers: {
        Accept: 'application/json',
    },
});
const requestInterceptor = (config) => {
    const accessToken = process.env.MIX_ACCESS_TOKEN;
    config.params = {
        access_token: accessToken,
        ...config.params, // Preserve any existing query parameters
    };

    return config;
};

// Add a request interceptor
const responseInterceptor = (response) => {
    switch (response.status) {
        case 200:
            // yay!
            break;
        // any other cases
        default:
        // default case
    }
    return response;
};

httpClient.interceptors.request.use(requestInterceptor);
httpClient.interceptors.response.use(responseInterceptor);

module.exports = httpClient;
