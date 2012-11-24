using System.Data;
using System.Linq;
using System.Web.Mvc;
using AdvertisedOn.Models;

namespace AdvertisedOn.Controllers
{
    [Authorize(Roles = "Administrator")]
    public class PaymentTypeController : Controller
    {
        private AdvertisedOnDb db = new AdvertisedOnDb();

        //
        // GET: /PaymentType/
        public ActionResult Index()
        {
            return View(db.PaymentTypes.ToList());
        }

        //
        // GET: /PaymentType/Details/5
        public ActionResult Details(int id = 0)
        {
            var paymenttype = db.PaymentTypes.Find(id);
            if (paymenttype == null)
            {
                return HttpNotFound();
            }
            return View(paymenttype);
        }

        //
        // GET: /PaymentType/Create
        public ActionResult Create()
        {
            return View();
        }

        //
        // POST: /PaymentType/Create
        [HttpPost]
        public ActionResult Create(PaymentType paymenttype)
        {
            if (ModelState.IsValid)
            {
                db.PaymentTypes.Add(paymenttype);
                db.SaveChanges();
                return RedirectToAction("Index");
            }

            return View(paymenttype);
        }

        //
        // GET: /PaymentType/Edit/5
        public ActionResult Edit(int id = 0)
        {
            var paymenttype = db.PaymentTypes.Find(id);
            if (paymenttype == null)
            {
                return HttpNotFound();
            }
            return View(paymenttype);
        }

        //
        // POST: /PaymentType/Edit/5
        [HttpPost]
        public ActionResult Edit(PaymentType paymenttype)
        {
            if (ModelState.IsValid)
            {
                db.Entry(paymenttype).State = EntityState.Modified;
                db.SaveChanges();
                return RedirectToAction("Index");
            }
            return View(paymenttype);
        }

        //
        // GET: /PaymentType/Delete/5
        public ActionResult Delete(int id = 0)
        {
            var paymenttype = db.PaymentTypes.Find(id);
            if (paymenttype == null)
            {
                return HttpNotFound();
            }
            return View(paymenttype);
        }

        //
        // POST: /PaymentType/Delete/5
        [HttpPost, ActionName("Delete")]
        public ActionResult DeleteConfirmed(int id)
        {
            var paymenttype = db.PaymentTypes.Find(id);
            db.PaymentTypes.Remove(paymenttype);
            db.SaveChanges();
            return RedirectToAction("Index");
        }

        protected override void Dispose(bool disposing)
        {
            db.Dispose();
            base.Dispose(disposing);
        }
    }
}