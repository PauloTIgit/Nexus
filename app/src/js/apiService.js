function apiRequestMain({ url, method = 'GET', data = null, contentType = 'application/json', headers = {}, logs = true, loding = [], setLoding = [] }) {
  loding.removeClass("hidden");
  setLoding.addClass("hidden");

  if (typeof window.serverApi === 'undefined') {
    if (logs) toastr.error("ServerApi não definido");
    console.error('Variável global serverApi não está definida!');
  } else {
    console.log('API configurada para:', window.serverApi);
  }

  return new Promise((resolve, reject) => {
    $.ajax({
      url: `${window.serverApi}/${url}`,
      type: method,
      contentType,
      data: data ? JSON.stringify(data) : null,
      headers,
      success: function (response) {
        if (response.success) {
          if (logs) toastr.success(response.msg);
          if (response.data?.url) {
            setTimeout(() => {
              window.location.href = response.data.url || '/login';
            }, 1000)
          }
        }

        if (!response.success) {
          if (logs) toastr.warning(response.msg);
        }

        localStorage.setItem('status_creat_conta', response.success)
        resolve(response);
        console.debug(`[API ${method}] Sucesso:`, response)
        setTimeout(() => {
          setLoding.removeClass("hidden");
          loding.addClass("hidden");
        }, 1500)
      },
      error: function (error) {
        if (logs) toastr.error("Erro interno. Contate o suporte");
        reject(error);
        console.error(`[API ${method}] Erro:`, error || error)
        setTimeout(() => {
          setLoding.removeClass("hidden");
          loding.addClass("hidden");
        }, 1500)
      }
    });


  });
}

// Métodos públicos
export async function apiRequest({ url, method = 'GET', data = null, showLogs = true, headers = {}, loding = [], setLoding = [] }) {
  return apiRequestMain({
    url: url,
    method: method,
    data: data,
    headers: headers,
    logs: showLogs,
    loding: loding,
    setLoding: setLoding
  });
}
