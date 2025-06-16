<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function create()
    {
        return view('users.create');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
       // dd($user);
        return view('uzuarios.edit', compact('user'));
    }

public function update(Request $request, $id)
{
    $user = User::findOrFail($id);

    // Validação dos dados
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:users,email,' . $id,
        'password' => 'nullable|string|min:6|confirmed', // espera campo password_confirmation
        'familiname' => 'nullable|string|max:255',
        'Birthday' => 'nullable|date_format:d/m/Y',
        'Occupation' => 'nullable|string|max:255',
        'Mobile' => 'nullable|string|max:20',
        'Phone' => 'nullable|string|max:20',
        'dicadesenha' => 'nullable|string|max:255',
        'biografia' => 'nullable|string',
        'Country' => 'nullable|string|max:255',
        'Countrycode' => 'nullable|string|max:10',
        'data_vencimento' => 'nullable|date',
        'status' => 'nullable|boolean',
        'is_blocked' => 'nullable|boolean',
        'is_admin' => 'nullable|boolean',
    ]);

    // Atualiza os dados do usuário
    $user->name = $request->input('name');
    $user->email = $request->input('email');
    $user->familiname = $request->input('familiname');

    // Converte Birthday para formato Y-m-d (MySQL)
    if ($request->filled('Birthday')) {
        $user->Birthday = \Carbon\Carbon::createFromFormat('d/m/Y', $request->input('Birthday'))->format('d-m-Y');
    } else {
        $user->Birthday = null;
    }

    $user->Occupation = $request->input('Occupation');
    $user->Mobile = $request->input('Mobile');
    $user->Phone = $request->input('Phone');
    $user->dicadesenha = $request->input('dicadesenha');
    $user->biografia = $request->input('biografia');
    $user->Country = $request->input('Country');
    $user->Countrycode = $request->input('Countrycode');

    // data_vencimento deve estar no formato Y-m-d para salvar no banco
    if ($request->filled('data_vencimento')) {
        $user->data_vencimento = $request->input('data_vencimento');
    } else {
        $user->data_vencimento = null;
    }

    $user->status = $request->input('status', 0);
    $user->is_blocked = $request->input('is_blocked', 0);
    $user->is_admin = $request->input('is_admin', 0);

    // Atualiza a senha somente se for enviada
    if ($request->filled('password')) {
        $user->password = bcrypt($request->input('password'));
    }

    $user->save();

    return redirect()->route('users.edit', $id)->with('success', 'Usuário atualizado com sucesso.');
}




    public function store(Request $request)
    {
        $fotoperfil = 'data:image/jpeg;base64,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CAEBAAE/IZhLVWTE/IFGUDgFVPeiape+jnKAqB8qgF5ih0BP/YVBzqAUAIlGNyisWawBhINH3oqjRuhACObIyREnIk76GveSigHhOhhfhTkH20vvAuhCI4nRJt2CJcua6eDI3BPF/EyqbnVPc0ZXsSMSo42441lpFxlCdAyKdtIly5rrYduNlXuCWgEcnfXxAiO4+FIRP0Aw6gQgjfsARsiJCamM6rRRFSC/RkbQ+lnnCIYxnOBUiHPY6DaJmsBcqN/adwasv4iTSCqBBC0I6EsHNE89zM95CmmSaguRNfIsXHTe8wAcsKoLF76dQ2r0I/lmPBzASF0QxYyyYIqEGBcOuAAJnMIzeQRmPLZkbvdMFhYE0Y+0yPGEJzZMwUm1+Uxo+UZjx2muAMCbUmPnNt1DMeCFgYKY32XQiHEuHZo4FPMnmsReDLGHLUmhyCSmMicZSERDvHZYTp8BidsYFvqn1dDBRNJSge7oQVALNOFCA5IkkuS5nb7npumPojxYuu0oh9D3hEesIZZpCYCTsq83JBu+AgPJ8r9pR/oVgQVtnlVNbab5gHsMV5MCUfYfKixO+EAGAAbScwZCi8L5l/oAO2jC8JLyAABgGE0VGGSJNRmRXsx74fZNj3AEmESUC8/zoBNDhEJxE79xhgclAGNbnvEYDgo7F1D25I/GiAAREEXdU7c1/iSdL9DDnr9m0gioKWoOrTD4Ev09OF6eHKa/ZAAAAUGlgqtXHRlgRtNNtcJ8bxU40zMZndcIDbQghq6MnBAFNEQDVEtoCFAFY6YgGqOKIrSgCaBA7oCNWzp6yIbpuoA9BgKDQf/aAAwDAQACAAMAAAAQ88888wXNNtdN/wDPPPPPPPPOL/ffffffffe9PPPPPODfffffffffffTfPPPPNfffffffffffffb9PPP/AH33333333333333fyj333333X/4/wB99999t8H99999188888999999+999999e88888r99999vV99999U88888+999999199999U88888/99999pd99999v88888199999t1999999vww6199999937999999999999999998s19999xfecu/199999c8X995vc888888T995c88sV9/8APPPPPPPPFfe/PPPPK3PPPPPPPPPLO/PPPPPPDOPPPPPPPOHPPPPPPPPPPLEOMNJPPPPPPPP/xAAcEQACAgIDAAAAAAAAAAAAAAABESBQAEAQMGD/2gAIAQMBAT8Qk5PVfhlwuk75kKA1gw7SgrFW3//EABsRAQACAwEBAAAAAAAAAAAAAAERMAAQIEBQ/9oACAECAQE/EOoyOIyK4qTyJ5E4PA1Tk5NJ02OHT0dNp4y1LHDtNxkduHiaJydTk9Ox4WgaB0tRpepsX5X/xAAqEAEAAQIEBAYDAQEAAAAAAAABEQAhMDFBUWFxgaEQIECRsdHB4fDxUP/aAAgBAQABPxDEISgDVqdGIXBPfLvSZBz/ABH3WSlwvzXwUYVmb5pqVzWgskdaf9oZTl30fKrCVwEf7pVtR3yffajpt+Q39s/UT2VyM16U+QDnvt/tThLi26GWIKIijUGPVnfOhBmHVPu+6EkGR1PRrAvVqSDS1HkaUvY81SvoXS7quL+4UuPn2fJ19CCmNAvzU9K00HI9LCOpYzj7KGmtxNcYEI5NDgONIiKmVbs+nkLlbrZ/dB5hkjmtnEWeAF8H36oryEyGzQ5uCZrZwo9yWLsOPrB13JoCnfm9gAYxtHbjSIiplXP1qzipA3b0IRGRuPme+DlacWJWNjQ9fniKU6m3SnyzK7q6HT/gPvDiNR2wLmzqeSEKyxu6FOmrKd5xsmTeLe+VfPbLQtT/AHnRi/eKKvcCaue2dIgETRxpx9o/Y+PJKyw62n9xxSSOwcWgSHjZOn3QAQEHliYbHU60Yyau+KYyGkdorJRT4EiQCVpM9M8jQxBIQZ6AUYhGq5ru4JJDOY68TFmRfpD+/nwzpEA659pxGMFTAGtGDC7rdwyAobLZ2xM7RIuuXePCwuL+D84hgrWHN/WJptLOzo0iBCMOGuYgTmVphL3VCNOwT+cTJ97vXLtGLZxBb6595xJu07DFclDoOJFOQHtikatR7f7iIbwOxXEwe+JcE2xXZ4fhiR7+WKuVxL3zJnnriwPp+6/5iDBQgNmMSes1Jyf5xFAVYCtp7HLTtiSLGtcDB3xEv2gcGkAgiSPDDOU0eRritHavgqJ79wn84pQttb4wlKWMgzXYperuximifuI/FQwW7w/5jQh2Mj7UgFCOSZeeQqXkc2px2MjLGPGEjPPWo04/Jt8xjp9dcKPhzcufdF306QH2oRyRo2SuLFH5Xtf3yopAN12mSkzVlcaz1hnlm9vAbdeDnp3pEUSEtH/DkstAc39T4z8L3vZ95/4ZzLd6y7R4zATYctfvpi8PNCagklxX7UMuuQUVc51D/d+6TkjkqV88JQL8AEVceIXGLJZI9k+6jbxAESRs0gIyu7j9YU7KaqwdahEbRanAhQgwQ2AXAaIVj0y9lIiiI4Vnou8tHllPmHcwAVAJaWEgZmp5/VGRBkBBisEbBz671GW7IZOA5x7jsf3Ggix5tSVafxD5jIqIA1ooh7PJ6BYJcxq6RFtRwfM+5UBUeDm3HznSFCOtKb29wvICoBLQgIl7NvRCUIQjrVpy5z8PHywp28nR94IwWbjqO5SHm6A3PGSzbIvz6QOrOuzRXQkc/HUBm+nFw0ZcQzW5UTZHJyFIHksrY1omQCA4eljx4TX9PCduxvl+sVsdahCBQoubH015aWJvT1wXNkNOvoDb2O1IoCPo75luoGy+/ojYElCu5NqRGERx8nLbtXC56YCANE5051vA4UiMNsHNBKYXB3rTpePq0ZikmQ5UXJHWk8aaazyfejYXrRlA9B//2Q==';

        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
           
        ]);

        // Corrigido: Salvar apenas o base64 limpo (sem cabeçalho) no banco
        
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'fotoperfil' => $fotoperfil,
        ]);

        return redirect()->route('dashboard')->with('message', 'Usuário criado com sucesso!');
    }



    
    public function destroy($id)
{
    $user = User::findOrFail($id);
    $user->delete();

    return redirect()->route('users.index')->with('success', 'Usuário deletado com sucesso.');
}

}
