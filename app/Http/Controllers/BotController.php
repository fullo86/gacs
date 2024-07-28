<?php

namespace App\Http\Controllers;

use App\Models\BotCommend;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class BotController extends Controller
{
    public function page_bot_wa()
    {
        return view('bot.whatsapp_bot');
    }

    public function store_inform_wa(Request $request)
    {
        $user = Auth::user()->id;
        $botcmd = BotCommend::all();

        $id = Str::uuid();
        $data = $request->all();
        $data['id'] = $id->toString();
        $data['user_id'] = $user;
        $data['order_id'] = rand();
        $data['service'] = 'whatsapp_bot';
        $data['gross_amount'] = 50000;
        $data['status'] = 'inactive';
        $newData = Transaction::create($data);

        foreach ($botcmd as $value) {
            $newData->botcmd()->attach($newData->id, ['alias' => $value->description_en, 'bot_id' => $value->id]);
        }

        if (!$newData) {
            Session::flash('status', 'failed');
            Session::flash('message', 'Failed to Store the data');
        }

        Session::flash('status', 'success');
        Session::flash('message', 'Data Successfully created, please go to transaction menu to activated');
        return redirect(route('bot_wa'));
    }
    
    public function page_bot_telegram()
    {
        return view('bot.telegram_bot');
    }

    public function store_inform_telegram(Request $request)
    {
        $user = Auth::user()->id;
        $botcmd = BotCommend::all();

        $id = Str::uuid();
        $data = $request->all();
        $data['id'] = $id->toString();
        $data['user_id'] = $user;
        $data['order_id'] = rand();
        $data['service'] = 'telegram_bot';
        $data['gross_amount'] = 50000;
        $data['status'] = 'inactive';
        $newData = Transaction::create($data);

        foreach ($botcmd as $value) {
            $newData->botcmd()->attach($newData->id, ['alias' => $value->description_en, 'bot_id' => $value->id]);
        }

        if (!$newData) {
            Session::flash('status', 'failed');
            Session::flash('message', 'Failed to Store the data');
        }

        Session::flash('status', 'success');
        Session::flash('message', 'Data Successfully created, please go to transaction menu to activated');
        return redirect(route('bot_telegram'));
    }

    public function destroy($id)
    {
        $removeTrx = Transaction::findOrFail($id);

        if (!$removeTrx) 
        {
            Session::flash('status', 'failed');
            Session::flash('message', 'Failed Delete Transaction Data');
        }

        $removeTrx->delete();
        Session::flash('status', 'success');
        Session::flash('message', 'Successfully Delete Transaction Data');
        return redirect(route('transactions'));
    }

    public function showDeleted()
    {
        $TrxDeleted = Transaction::onlyTrashed()->get();
        return view('transactions.show_deleted', ['TrxDeleted' => $TrxDeleted]);
    }

    public function restore($id)
    {
        $restoreTrx = Transaction::withTrashed()->where('id', $id)->restore();

        if (!$restoreTrx) {
            Session::flash('status', 'failed');
            Session::flash('message', 'Failed to Restore Transaction Data');
        }

        Session::flash('status', 'success');
        Session::flash('message', 'Successfully Restore Transaction Data');
        return redirect(route('transactions'));
    }
    

    public function view_command($id)
    {
        $trx_botcmd = Transaction::with('botcmd')->findOrFail($id);

        return view('bot.bot_command', ['list_cmd' => $trx_botcmd]);

    }

    public function updateBotCommands(Request $request, $id)
    {
        $trx = BotCommend::findOrFail($id);
            $trx->transactions()->updateExistingPivot($id, [
                'status' => 'inactive',
            ]);    
    }

    // public function updateBotCommands(Request $request, $id)
    // {
    //     // Temukan pengguna berdasarkan ID
    //     $user = User::with('botcmd')->findOrFail($id);

    //     dd($user->botcmd);
    //     if ($user->botcmd()) {
    //         # code...
    //     }
    //     // Ambil data status dari request
    //     $statuses = $request->input('status', []);
    //     $user->botcmd()->sync($request->all($statuses));

    //     // Redirect atau kembalikan response
    //     return redirect()->route('bot-commands', $user->id)->with('success', 'Bot command settings updated successfully.');
    // }

    // public function updateBotCommands(Request $request)
    // {
    //     // Ambil data dari form
    //     $statuses = $request->input('status', []);

    //     // Daftar ID bot dari form
    //     $botIds = array_keys($statuses);

    //     // Update status untuk ID yang ada di form
    //     foreach ($botIds as $botId) {
    //         $status = isset($statuses[$botId]) ? $statuses[$botId] : 'inactive';

    //         // Update atau buat entry status
    //         BotCommend::updateOrCreate(
    //             ['user_id' => $request->user_id, 'bot_id' => $botId],
    //             ['status' => $status]
    //         );
    //     }

    //     // Tandai bahwa update berhasil
    //     return response()->json(['message' => 'Status berhasil diperbarui']);
    // }



    // public function updateBotCommands(Request $request, $id)
    // {
    //     // Temukan pengguna berdasarkan ID
    //     $user = User::findOrFail($id);
    
    //     // Ambil data status dari request
    //     $statuses = $request->input('status', []);
    
    //     // Debugging
    //     Log::info('Statuses received:', $statuses);
    
    //     // Ambil ID botcmd yang sudah ada untuk pengguna
    //     $existingBotcmds = $user->botcmd->pluck('id')->toArray();
    
    //     // Debugging
    //     Log::info('Existing botcmd IDs:', $existingBotcmds);
    
    //     // Update status untuk botcmd yang dicentang
    //     foreach ($statuses as $botcmdId => $status) {
    //         if ($status === 'active') {
    //             // Debugging
    //             Log::info("Updating botcmd $botcmdId with status $status");
                
    //             $user->botcmd()->updateExistingPivot($botcmdId, ['status' => 'active']);
    //         }
    //     }
    
    //     // Update status untuk botcmd yang tidak dicentang menjadi inactive
    //     foreach ($existingBotcmds as $botcmdId) {
    //         if (!array_key_exists($botcmdId, $statuses)) {
    //             // Debugging
    //             Log::info("Updating botcmd $botcmdId to inactive");
    
    //             $user->botcmd()->updateExistingPivot($botcmdId, ['status' => 'inactive']);
    //         }
    //     }
    
    //     // Redirect atau kembalikan response
    //     return redirect()->route('bot-commands', $user->id)->with('success', 'Bot command settings updated successfully.');
    // }
    

    // public function settings_bot_command(Request $request, $id)
    // {
    //     $user_botcmd = User::with('botcmd')->findOrFail($id);

    //     $statusUpdates = $request->input('status', ['status' => 'active']);

    //     dd($user_botcmd->botcmd[0]->pivot->status);
    //     $user_botcmd = $request->all();
    //     // $updateBook->update($user_botcmd);

    //     // $updateBook->botcmd()->sync($request->status);
    //     //     dd($updateBook);
    //     // $updateCmd->update($user_botcmd);

    //     // if ($request->) {
    //     //     # code...
    //     // }
        
    // }
}


