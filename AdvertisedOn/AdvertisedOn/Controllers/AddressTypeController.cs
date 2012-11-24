using System.Data;
using System.Linq;
using System.Web.Mvc;
using AdvertisedOn.Models;

namespace AdvertisedOn.Controllers
{
    [Authorize(Roles="Administrator")]
    public class AddressTypeController : Controller
    {
        private AdvertisedOnDb db = new AdvertisedOnDb();

        //
        // GET: /AddressType/
        public ActionResult Index()
        {
            return View(db.AddressTypes.ToList());
        }

        //
        // GET: /AddressType/Details/5
        public ActionResult Details(int id = 0)
        {
            var addresstype = db.AddressTypes.Find(id);
            if (addresstype == null)
            {
                return HttpNotFound();
            }
            return View(addresstype);
        }

        //
        // GET: /AddressType/Create
        public ActionResult Create()
        {
            return View();
        }

        //
        // POST: /AddressType/Create
        [HttpPost]
        public ActionResult Create(AddressType addresstype)
        {
            if (ModelState.IsValid)
            {
                db.AddressTypes.Add(addresstype);
                db.SaveChanges();
                return RedirectToAction("Index");
            }

            return View(addresstype);
        }

        //
        // GET: /AddressType/Edit/5
        public ActionResult Edit(int id = 0)
        {
            var addresstype = db.AddressTypes.Find(id);
            if (addresstype == null)
            {
                return HttpNotFound();
            }
            return View(addresstype);
        }

        //
        // POST: /AddressType/Edit/5
        [HttpPost]
        public ActionResult Edit(AddressType addresstype)
        {
            if (ModelState.IsValid)
            {
                db.Entry(addresstype).State = EntityState.Modified;
                db.SaveChanges();
                return RedirectToAction("Index");
            }
            return View(addresstype);
        }

        //
        // GET: /AddressType/Delete/5
        public ActionResult Delete(int id = 0)
        {
            var addresstype = db.AddressTypes.Find(id);
            if (addresstype == null)
            {
                return HttpNotFound();
            }
            return View(addresstype);
        }

        //
        // POST: /AddressType/Delete/5
        [HttpPost, ActionName("Delete")]
        public ActionResult DeleteConfirmed(int id)
        {
            var addresstype = db.AddressTypes.Find(id);
            db.AddressTypes.Remove(addresstype);
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